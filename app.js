var http = require('http');
var fs = require('fs');
var mysql = require('mysql');
var index = fs.readFileSync( 'index.html');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "r00t",
  database: "tics"
});

var SerialPort = require('serialport');
const parsers = SerialPort.parsers;

const parser = new parsers.Readline({
    delimiter: '\r\n'
});

var port = new SerialPort('/dev/ttyACM0',{ 
    baudRate: 9600,
    dataBits: 8,
    parity: 'none',
    stopBits: 1,
    flowControl: false
});

port.pipe(parser);

var app = http.createServer(function(req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end(index);
});

var io = require('socket.io').listen(app);

io.on('connection', function(socket) {
    
    console.log('Node is listening to port');
    
});

var test, test2;
parser.on('data', function(data) {
    
    console.log(data);
    
    io.emit('data', data);
    
    test= parseFloat(data.split(" ")[1]);
    test2= data.split(" ")[0];
    
    if(typeof(test)!== undefined){
		insertData(con, test);
	}
    
});

function insertData(con, test){
	if(typeof(test2) == "string"){

		  if(test2.includes("Humedad:")){	
		   var sql = `INSERT INTO humedad VALUES (${test}, NOW())`;
		  }
		  else if(test2.includes("Caudal:")){
			 var sql = `INSERT INTO flujo VALUES (${test}, NOW())`;
		  }
		  else if(test2.includes("Temperatura:")){	
			 var sql = `INSERT INTO temperatura VALUES (${test}, NOW())`;
		  }
		  else if(test2.includes("HX711:")){		  
			 var sql = `INSERT INTO comida VALUES (${test}, NOW())`;
		  }
		  else {
			  var sql = "";
		  }
	  }
	 if(sql!=""){ 
		con.query(sql, function (err, result) {
		 if (err) throw err;
			console.log(result);
		});
	}
}
app.listen(4000);

