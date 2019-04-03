/* importar o módulo do framework express */
const express = require('express');

/* iniciar o objeto do express */
const app = express();

/*DOTENV*/
require('dotenv').config();

/*MYSQL Events*/
const MySQLEvents = require('mysql-events');
const dsn = {
	host:      process.env.DB_HOST,
	user:      process.env.DB_USERNAME,
	password:  process.env.DB_PASSWORD
  };

let myCon = MySQLEvents(dsn);

const mysql = require('mysql');

const pool  = mysql.createPool({
	connectionLimit : 100,
	host     : process.env.DB_HOST,
	user     : process.env.DB_USERNAME,
	password : process.env.DB_PASSWORD,
	database : process.env.DB_DATABASE
});

/* parametrizar a porta de escuta */
const server = app.listen(3000, function(){
	console.log('Servidor online');
});

const io = require('socket.io').listen(server);

app.set('io', io);

io.set('transports', ['websocket']);

/* Criar a conexao por websocket */

io.on('connection', function(socket){
	/*console.log('Usuário conectou');

	socket.on('disconnect', function(){
		console.log('Usuário desconectou');
	});*/

	socket.on('msgParaServidor', function(data){
		
		pool.query(`SELECT id_viatura from viaturas where rfid = "${data.rfid}"`, function (error, results, fields) {
			if (error) throw error;
			if (typeof(results[0]) !== 'undefined'){
				socket.emit(
					'msgParaCliente', 
					{rfid: results[0].id_viatura}
					);
			} else {
				socket.emit(
					'msgParaCliente', 
					{rfid: 0}
				);
			}
        });
	});

	let event1 = myCon.add(
		process.env.DB_DATABASE+'.percursos',
		function (oldRow, newRow, event) {
		  //insert Row
		  if (oldRow === null) {
			//insert code goes here
			//console.log(newRow.fields);
	
			pool.query(`SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante,  DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno,  DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
			FROM percursos, viaturas, motoristas, marcas, modelos, destinos
			WHERE data_retorno IS NULL 
			AND percursos.id_motorista = motoristas.id_motorista
			AND percursos.id_viatura = viaturas.id_viatura
			AND viaturas.id_marca = marcas.id_marca
			AND viaturas.id_modelo = modelos.id_modelo
			AND percursos.id_destino = destinos.id_destino
			ORDER BY id_percurso DESC`, function (error, results, fields) {
				if (error) throw error;

				socket.emit(
					'viaturasRodando', 
					{dados: results}
					);

				socket.broadcast.emit(
					'viaturasRodando', 
					{dados: results}
					);
			});
	
		  }
		  //remove
		  if (newRow === null) {
	
			pool.query(`SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante,  DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno,  DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
			FROM percursos, viaturas, motoristas, marcas, modelos, destinos
			WHERE data_retorno IS NULL 
			AND percursos.id_motorista = motoristas.id_motorista
			AND percursos.id_viatura = viaturas.id_viatura
			AND viaturas.id_marca = marcas.id_marca
			AND viaturas.id_modelo = modelos.id_modelo
			AND percursos.id_destino = destinos.id_destino
			ORDER BY id_percurso DESC`, function (error, results, fields) {
				if (error) throw error;

				socket.emit(
					'viaturasRodando', 
					{dados: results}
					);
				
				socket.broadcast.emit(
					'viaturasRodando', 
					{dados: results}
					);
			});
	
		  }
		  //update
		  if (oldRow !== null  && newRow !== null) {
	
			pool.query(`SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante,  DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno,  DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
			FROM percursos, viaturas, motoristas, marcas, modelos, destinos
			WHERE data_retorno IS NULL 
			AND percursos.id_motorista = motoristas.id_motorista
			AND percursos.id_viatura = viaturas.id_viatura
			AND viaturas.id_marca = marcas.id_marca
			AND viaturas.id_modelo = modelos.id_modelo
			AND percursos.id_destino = destinos.id_destino
			ORDER BY id_percurso DESC`, function (error, results, fields) {
				if (error) throw error;

				socket.emit(
					'viaturasRodando', 
					{dados: results}
					);
				
				socket.broadcast.emit(
					'viaturasRodando', 
					{dados: results}
					);
			});
	
		  }
		}, 
		'Active'
	  );
	
});
