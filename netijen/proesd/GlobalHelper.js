'use strict'

/**
 * Global Helper
 */
const klaw = require('klaw')
const through2 = require('through2')
const fs = require('fs')

class GlobalHelper {
  getDirectories (source) {
    return fs.readdirSync(source, {
      withFileTypes: true
    }).filter(dirent => dirent.isDirectory()).map(dirent => dirent.name)
  }

  readDir (path) {
    const excludeDirFilter = through2.obj(function (item, enc, next) {
      if (!item.stats.isDirectory()) this.push(item)
      next()
    })
    return new Promise((resolve, reject) => {
      const files = []
      klaw(path)
        .pipe(excludeDirFilter)
        .on('data', item => {
          files.push(item.path)
        })
        .on('end', () => resolve(files))
        .on('error', reject)
    })
  }

  sleep (ms) {
    return new Promise(resolve => setTimeout(resolve, ms))
  }
}

module.exports = GlobalHelper
