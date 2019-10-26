//var io = require('socket.io')(8080)
var Redis = require('ioredis');
var redis = new Redis(6379);
console.log('connected port');
//io.on('error', function (socket) {
  //  console.log('error')
//});

//io.on('connection', function (socket) {
  //  console.log('someone connected'+ socket.id)
    // socket.emit('news', { hello: 'world' })
    // socket.on('broadcast', function (message) {
    //     console.log('ElephantIO broadcast > ' + JSON.stringify(message));
    //
    //     // send to all connected clients
    //     // io.sockets.emit("notify", message);
    // });
    //
    // socket.on('disconnect', function () {
    //     console.log('SocketIO : Received ' + nb + ' messages');
    //     console.log('SocketIO > Disconnected socket ' + socket.id);
    // });

//})

var Redis = require('ioredis')
var redis = new Redis(8001)
redis.psubscribe("*", function(err, count) {
});

//redis.on('pmessage',function (partner, channel, message) {
   // console.log(message);
   // console.log('resdissss');
  //  io.emit('notify','CO TIN NHAN MOI')
   // io.emit('notify','REDIS==>')
//})

//
// redis.on('pmessage',function (partner, channel, message) {
//     console.log(message);
// })


