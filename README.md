# Controle
Sistema desenvolvido como Trabalho de Conclusão de Curso do curso de Análise e Desenvolvimento de Sistemas 
do Instituto Federal de Educação Ciência e Tecnologia do Estado de São Paulo - Campus Hortolândia

Para utilização siga as instruções abaixo:

Instale o Apache e o Mysql.

Coloque os arquivos do sistema na pasta raiz do apache

/var/www/html     (Local da pasta no Linux)

No diretório raiz rode o "composer"

O arquivo do banco de dados esta na pasta sql, com o nome de controle.sql

Site/sql/controle.sql

Crie um banco de dados no MySql e importe o controle.sql

Configure o usuário e senha da conexão com o banco de dados, o arquivo a ser alterado é o arquivo conexao.php na pasta model.

Site/model/conexao.php

Abaixo esta a linha a ser alterada

$pdo = new PDO("mysql:host=localhost;dbname=coloque_o_nome_do_banco", "coloque_o_usuario_do_BD", "coloque_a_senha_do_BD");

Altere o arquivo do configuração do Apache

/etc/apache2/apache2.conf    (Arquivo no Linux)

Dentro do arquivo apache2.conf procure por <Directory /var/www/> e altere conforme as linhas abaixo

        Options Indexes FollowSymLinks

        AllowOverride All

        Require all granted

Reinicie o Apache

No Linux é necessário dar permissão a pasta do projeto

O .htaccess está configurado para redirecionar as requisições para HTTPS.

#Redirecionar para https
RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}

E o arquivo config.inc.php utiliza o Server_name do apache e define o protocolo https.

$endereco = $_SERVER['SERVER_NAME'];

define("HOST", "https://" . $endereco);

Caso deseje utilizar somente o protocolo http, comente a as linhas do .htaccess e altere o para http no config.inc.php
Ficando o .htaccess assim

#Redirecionar para https
#RewriteCond %{HTTPS} off
#RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}

E o config.inc.php:

define("HOST", "http://" . $endereco);

O Usuário e Senha padrão do sistema é admin

Criar os arquivos .env e env.php conforme modelos

Para que a tabela da página inicial seja atualizada via Socket deve-se permitir o BINLOG no banco de dados
