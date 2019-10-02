'use strict'
const fs = require('fs');
const request = require('request');
const fetch = require("node-fetch");
const { URLSearchParams } = require("url");
const readlineSync = require('readline-sync');

const functionGetLink = ( url ) => new Promise (( resolve, reject ) => {
	const params = new URLSearchParams();
	params.append("url", url);
	
	fetch("http://www.funnyvideodownloader.com/download.php", {
    	method: 'POST',
    	body: params, 
    })
	.then(res => res.text())
	.then(body => {
		let igeh = body.split('<source src="')[1].split('"')[0]
		resolve(igeh)
	})
	.catch(err => {
    	reject(err)
    })
})

const functionDownload = ( url, filename, callback ) => new Promise (( resolve, reject ) => {
	request.head(url, function(err, body){
    request(url).pipe(fs.createWriteStream(filename)).on('close', callback);
});
})

async function downloadLurd() {
	const takon = await readlineSync.question("Masukan Link Tiktok : ");
	const getLink = await functionGetLink(takon);
	const download = await functionDownload(getLink, 'tiktod.mp4', function(){ 
    		console.log('Berhasil Di Download');
});
    	console.log(`${takon}${getLink}${download}`)
    }	
downloadLurd()
