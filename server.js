/* importar o módulo do framework express */
const express = require('express');

/* iniciar o objeto do express */
const app = express();

/* parametrizar a porta de escuta */
const server = app.listen(3000, function(){
	console.log('Servidor online');
});

const io = require('socket.io').listen(server);

app.set('io', io);

/* Criar a conexao por websocket */
io.on('connection', function(socket){
	console.log('Usuário conectou');

	socket.on('disconnect', function(){
		console.log('Usuário desconectou');
	});

	socket.on('msgParaServidor', function(data){
		/*dialogo*/
		console.log(data);
		socket.broadcast.emit(
			'msgParaCliente', 
			{acompanhante: data.acompanhante}
			);
		
		socket.emit(
			'msgParaCliente', 
			{acompanhante: data.acompanhante}
			);


		/*participantes*/
		if(parseInt(data.apelido_atualizado_nos_clientes) == 0){
			socket.emit(
				'participantesParaCliente', 
				{apelido: data.apelido}
			);

			socket.broadcast.emit(
				'participantesParaCliente', 
				{apelido: data.apelido}
			);
		}
	});
});
