var http = require('http');
var fs = require('fs');

const PORT=8080; 

function handleRequest(request, response){
    if (request.url === '/board') {
      // create game board
      response.writeHead(200, {"Content-Type": "application/json"});
      var rows = 5;
      var cols = 5;
      var chance = 0.2;
      var board = [];
      for (var i = 0; i < rows * cols; i++) {
        board.push(Math.random() < chance);
      }
      response.end(JSON.stringify({
        rows: rows,
        cols: cols,
        board: board
      }));
    } else {
      // serve any file provide by url. This is very unsecure, for demo purposes only!
      var filename = request.url.replace(/^\//, '');
      fs.exists(filename, function(exists) {
        filename = exists ? filename : 'index.html';
        fs.readFile(filename, 'utf-8', function(err, data) {
          if (err) {console.log(err);}
          response.end(data);
        });
      });
    }
}

var server = http.createServer(handleRequest);

server.listen(PORT, function(){
    console.log("Server listening on: http://localhost:%s", PORT);
});
