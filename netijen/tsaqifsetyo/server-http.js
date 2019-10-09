var http = require ('http'),
PORT = 3400;
var server = http.createServer(function(req, res){
    var body = "<pre> Kenapa belajar NodeJS?</pre><p><h3>Karena NodeJS Mantap Betul </h3></p>"
    res.writeHead(200, {
        'Content-Length':body.length,
        'Content-Type':'text/html',
        'Pesan-Header':'Pengenalan Node.js'
    });
    res.write(body);
    res.end();
});
server.listen(PORT);
console.log("Port"+PORT+" : Node.js Server...");