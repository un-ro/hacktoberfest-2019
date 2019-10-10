'use strict'
/**
 * Part of project
 * By : github.com/ericksuryadinata
 */

/**
 * Given folder structure
 * |-var
 * |--|-www
 * |-----|-folder
 * |-----------|-{clientNumber}
 * |----------------------|-{year}
 * |---------------------------|-{month}
 * |--------------------------------|-{day}
 * |------------------------------------|-{file.txt}
 * |------------------------------------|-{file2.txt}
 *
 * if you give path /var/www/folder
 * so the parent directories will be {clientNumber}
 *
 * if you give path /var/www/folder/{clientNumber}
 * so the parent directories will be {year}
 *
 * the logic from this file is
 * 1. find the folder
 * 2. read through that folder and find the parent directory
 * 3. on parent directory, read through to find the .txt files
 * 4. read the .txt files
 * 5. save to elasticsearch
 *
 */

const {
  Client
} = require('@elastic/elasticsearch')
const Env = require('Env')
const URL = Env.get('ELASTIC_URL')
const Helper = require('./GlobalHelper')
const fs = require('fs')
const Drive = require('Drive')
const _ = require('lodash')
const Cli = require('cli-progress')
const Moment = require('moment')

class Elasticsearch {
  constructor () {
    this.Client = new Client({
      node: URL,
      maxRetries: 100,
      requestTimeout: 100000
    })
    this.Helper = new Helper()
  }

  async fromFile (documentFolder) {
    // prepare the progress bar
    const clientProgress = new Cli.SingleBar({
      format: '[INFO] Progress [{bar}] {percentage}% | ETA: {eta}s | {value}/{total}',
      clearOnComplete: false,
      hideCursor: true
    }, Cli.Presets.shades_classic)

    const fileProgress = new Cli.SingleBar({
      format: '[INFO] Progress [{bar}] {percentage}% | ETA: {eta}s | {value}/{total}',
      clearOnComplete: false,
      hideCursor: true
    }, Cli.Presets.shades_classic)
    // define the total exe time
    let totalExecutionTime = []
    totalExecutionTime[0] = 0
    totalExecutionTime[1] = 0
    let hrstart = process.hrtime()

    // create an elastic index
    await this.Client.indices.create({
      index: documentFolder.toLowerCase()
    }, {
      ignore: [400]
    })
    let hrend = process.hrtime(hrstart)
    totalExecutionTime[0] += hrend[0]
    totalExecutionTime[1] += hrend[1]

    console.info('Done Creating elastic index in : %ds %dms', hrend[0], hrend[1] / 1000000)
    await this.Helper.sleep(200)
    // begin to read the file
    const folder = 'path/to/your/file' // must complete path, ex : /var/www/tmp/folder
    if (await Drive.disk('local').exists(folder)) {
      let totalError = 0
      let totalDataUploaded = 0
      let totalFileData = 0
      let totalData = 0
      const erroredDocuments = []

      // get the parent / client directory
      let parentFolder = this.Helper.getDirectories(folder)
      // create the client progress bar
      clientProgress.start(parentFolder.length, 0)

      for (const key in parentFolder) {
        if (parentFolder.hasOwnProperty(key)) {
          const client = parentFolder[key]
          console.info('\n===========================================================')
          console.info('[INFO] Client Number ' + client)
          // read the client directory
          hrstart = process.hrtime()
          let file = await this.Helper.readDir(folder + client)
          hrend = process.hrtime(hrstart)
          console.info('[INFO] Done reading file on : { %s } with %d data(only file) in : %ds %dms', folder + client, file.length, hrend[0], hrend[1] / 1000000)
          totalExecutionTime[0] += hrend[0]
          totalExecutionTime[1] += hrend[1]
          await this.Helper.sleep(200)
          // begin reading the txt file
          hrstart = process.hrtime()
          let data = []
          fileProgress.start(file.length, 0)
          file.forEach(txt => {
            // let's check only txt file
            if (txt.indexOf('.txt') !== -1) {
              let namaFile = txt.split(folder)[1]
              let userId = namaFile.split('/')[0]
              // get the struck number
              let idStruck = namaFile.split('/')[4].split('.')[0]
              // read the content from the file
              let content = fs.readFileSync(txt, 'utf8')
              content = content.replace(/[0-9]{1}e\+24/gi, 'e+18')
              content = JSON.parse(content)
              content.id = userId + '' + idStruck
              data.push(content)
              fileProgress.increment()
            }
          })
          fileProgress.stop()
          hrend = process.hrtime(hrstart)
          console.info('[INFO] Done reading content of the file on : { %s } with %d data in : %ds %dms', folder + client, data.length, hrend[0], hrend[1] / 1000000)
          totalExecutionTime[0] += hrend[0]
          totalExecutionTime[1] += hrend[1]
          await this.Helper.sleep(200)

          // prepare the data
          hrstart = process.hrtime()
          const body = _.flatMap(data, doc => [{
            index: {
              _index: documentFolder.toLowerCase()
            }
          }, doc])

          // upload to elastic
          const {
            body: bulkResponse
          } = await this.Client.bulk({
            refresh: true,
            body
          })
          const errorNow = []
          if (bulkResponse.errors) {
            // The items array has the same order of the dataset we just indexed.
            // The presence of the `error` key indicates that the operation
            // that we did for the document has failed.
            bulkResponse.items.forEach((action, i) => {
              const operation = Object.keys(action)[0]
              if (action[operation].error) {
                erroredDocuments.push({
                  // If the status is 429 it means that you can retry the document,
                  // otherwise it's very likely a mapping error, and you should
                  // fix the document before to try it again.
                  status: action[operation].status,
                  error: action[operation].error,
                  operation: body[i * 2],
                  document: body[i * 2 + 1]
                })

                errorNow.push({
                  status: action[operation].status,
                  error: action[operation].error,
                  operation: body[i * 2],
                  document: body[i * 2 + 1]
                })
              }
            })
          }
          hrend = process.hrtime(hrstart)
          totalExecutionTime[0] += hrend[0]
          totalExecutionTime[1] += hrend[1]
          totalError += errorNow.length
          totalData += data.length
          totalFileData += file.length
          if (errorNow.length === 0) {
            console.info('[INFO] Done storing to elastic with %d of %d data in : %ds %dms with no error document ', data.length, data.length, hrend[0], hrend[1] / 1000000)
          } else {
            console.info('[INFO] Done storing to elastic with %d of %d data in : %ds %dms with error document : %d', data.length, data.length, hrend[0], hrend[1] / 1000000, errorNow.length)
          }
          console.info('===========================================================')
          clientProgress.increment()
          await this.Helper.sleep(500)
        }
      }
      totalDataUploaded = totalData - totalError
      const {
        body: count
      } = await this.Client.count({
        index: documentFolder.toLowerCase()
      })
      clientProgress.stop()
      console.info('\n===========================================================')
      console.info('Total Execution time : %ds %dms', totalExecutionTime[0], totalExecutionTime[1] / 1000000)
      console.info('File Data : %d\nData : %d\nData Uploaded : %d\nData Error : %d\nElastic Data : %d', totalFileData, totalData, totalDataUploaded, totalError, count.count)
      if (erroredDocuments.length !== 0) {
        await Drive.disk('local').put(Helpers.tmpPath('ElasticError/' + Moment().format('YMMDDHHmmss') + '.txt'), Buffer.from(JSON.stringify(erroredDocuments), 'utf8'))
        console.info('Error Log saved to ' + Helpers.tmpPath('ElasticError/' + Moment().format('YMMDDHHmmss') + '.txt'))
      }
      console.info('===========================================================')
    }
  }
}

module.exports = Elasticsearch
