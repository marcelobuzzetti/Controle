/* importar o módulo do framework express */
const express = require('express');

/* iniciar o objeto do express */
const app = express();

const mysql = require('mysql');

const pool  = mysql.createPool({
	connectionLimit : 100,
	host     : 'localhost',
	user     : 'root',
	password : 'apollo87',
	database : 'controle'
});

/* parametrizar a porta de escuta */
const server = app.listen(3000, function(){
	console.log('Servidor online');
});

const io = require('socket.io').listen(server);

app.set('io', io);

/* Criar a conexao por websocket */
io.on('connection', function(socket){
	/*console.log('Usuário conectou');

	socket.on('disconnect', function(){
		console.log('Usuário desconectou');
	});*/

	socket.on('msgParaServidor', function(data){
		
		pool.query(`SELECT id_viatura from viaturas where rfid = ${data.rfid}`, function (error, results, fields) {
			if (error) throw error;
			socket.emit(
				'msgParaCliente', 
				{rfid: results[0].id_viatura}
				);
		});
	});
});
