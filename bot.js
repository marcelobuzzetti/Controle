const TelegramBot = require( `node-telegram-bot-api` ),
dotenv      = require('dotenv').config()

const TOKEN = process.env.TELEGRAM_API

const mysql      = require('mysql');

const connection = mysql.createConnection({
  host     : process.env.DB_HOST,
  port     : process.env.DB_PORT,
  user     : process.env.DB_USERNAME,
  password : process.env.DB_PASSWORD,
  database : process.env.DB_DATABASE
});

/*Com Proxy*/
const bot = new TelegramBot( TOKEN, { polling: true , request: {
    proxy: process.env.PROXY ,
  } } )

bot.on('message', function(msg){
    console.log('msg', msg)
});

bot.onText(/\/start/, (msg) => {
    bot.sendMessage(msg.chat.id, "Olá "+msg.from.first_name)
});

bot.onText( /\/disponibilidade/, (msg) => {
    connection.connect((err) => {
        if(err) return console.log(err);
        console.log('conectou!');
        connection.query(`SELECT concat(m.descricao, " ",mo.descricao, " ",placa) AS viatura, 
            s.disponibilidade, 
            ifnull(concat(i.motivo, " em ",DATE_FORMAT(i.data,'%d/%m/%Y')),"-")  AS situação
            FROM viaturas v
            INNER JOIN marcas m ON m.id_marca = v.id_marca
            INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
            INNER JOIN habilitacoes ha ON ha.id_habilitacao = v.id_habilitacao
            INNER JOIN situacao s ON s.id_situacao= v.id_situacao
            LEFT JOIN indisponibilidade i ON i.id_viatura = v.id_viatura
            AND i.id_status = 1
            GROUP BY v.id_viatura
            ORDER BY viatura`, function (err, result, fields) {
            if (err) throw err;
            let table = "Viaturas - Disponibilidade - Situação\n"
            for(var i = 0; i < result.length; i++) {
                table = table + result[i].viatura+" - "+result[i].disponibilidade+" - "+result[i].situação+"\n"
            }
            bot.sendMessage(msg.chat.id, table);
          });
    })
});