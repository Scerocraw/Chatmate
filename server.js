// Express Framework
var app = require('express')();

// HTTP Layer
var http = require('http').Server(app);

// Request
var request = require('request');

// SocketIO
var io = require('socket.io')(http);

// Index
app.get('/', function (req, res) {
    res.sendFile(__dirname + '/application/views/node/index.html');
});

// IO Config
io.on('connection', function (socket) {
    console.log('a user connected');
    
    // On disconnect
    socket.on('disconnect', function () {
        console.log('user disconnected');
    });

    // On chat message
    socket.on('chat message', function (msg) {
        io.emit('chat message', msg);
        
        request.post({
            headers: {'content-type' : 'application/x-www-form-urlencoded'},
            url:     'http://localhost/api/addMessage',
            body:    "message=" + msg
        }, function(error, response, body){
        });
    });
});

// EMIT send
io.emit('some event', { for: 'everyone' });

// Listen on Port3000
http.listen(3000, function () {
    console.log('listening on *:3000');
});