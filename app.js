var http = require('http');
var fs = require('fs');
var mysql = require('mysql');
var XMLHttpRequest = require('xhr2');
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

var port = new SerialPort('/dev/ttyUSB0',{ 
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
    
	// io.emit('data', data);
    
    if(data.split(" ")[1] == "nan"){
		test = -1;
	}
	else{
		test= parseFloat(data.split(" ")[1]);
		test2= data.split(" ")[0];
	}
	
    if(typeof(test)!= undefined && test != NaN){
		insertData(con, test);
	}
    
});
var sql = ""
function insertData(con, test){
	if(typeof(test2) == "string"){

		  if(test2.includes("Humedad:")){	
			sql = `INSERT INTO humedad VALUES ('ffe1106377025958c5f2c9fa5125a94f', ${test}, NOW())`;
		  }
		  else if(test2.includes("Caudal:")){
			 sql = `INSERT INTO flujo VALUES ('ffe1106377025958c5f2c9fa5125a94f', ${test}, NOW())`;
		  }
		  else if(test2.includes("Temperatura:")){	
			 sql = `INSERT INTO temperatura VALUES ('ffe1106377025958c5f2c9fa5125a94f', ${test}, NOW())`;
		  }
		  else if(test2.includes("HX711:")){		  
			 sql = `INSERT INTO comida VALUES ('ffe1106377025958c5f2c9fa5125a94f', ${test}, NOW())`;
		  }
		  else {
			  sql = "";
		  }
	  }
	 if(sql!=""){ 
		con.query(sql, function (err, result) {
		 if (err) throw err;
			console.log(err);
		});
	}
}
app.listen(4000);

