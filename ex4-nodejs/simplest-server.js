var http = require('http');

var PORT = 8080;

function handleRequest(req, res) {
  console.log("Request to: " + req.url);
  res.end('OK');
}

var server = http.createServer(handleRequest);

server.listen(PORT, function(){
  console.log("Server listening on: http://localhost:%s", PORT);
});
