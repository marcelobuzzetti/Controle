Sistema C2

Desenvolvido para centralizar o controle e gerenciamento dos veículos oficiais de um órgão público. O C2 é um sistema web desenvolvido na linguagem PHP com design responsivo para suportar dispositivos móveis.

Para utilização siga as instruções abaixo:

Instale o Apache, o Node.js e o Mysql.

O PHP deve ser versão 8.

Coloque os arquivos do sistema na pasta raiz do apache

        /var/www/html     (Local da pasta no Linux)

No diretório raiz rode o "composer install" e o "npm install"

O arquivo do banco de dados esta na pasta sql, com o nome de controle.sql

        Site/sql/controle.sql

Crie um banco de dados no MySql e importe o controle.sql

Habilitar o mod_rewrite

        a2enmod rewrite (comando linux)

Altere o arquivo do configuração do Apache

        /etc/apache2/apache2.conf    (Arquivo no Linux)

Dentro do arquivo apache2.conf procure por <Directory /var/www/> e altere conforme as linhas abaixo

        Options Indexes FollowSymLinks

        AllowOverride All

        Require all granted

Reinicie o Apache

No Linux é necessário dar permissão a pasta do projeto

Criar os arquivos env.php e o .env conforme modelos

Em um terminal dentro da pasta do sistema, rodar vendor/bin/phinx migrate -e development

O sistema usa o módulo GD2, verifique se está instalado e ativo.

O Usuário e Senha padrão do sistema é admin

Para colocar uma imagem dentro do QRCode, deve-se salvar uma imagem, no formato PNG, com o nome brasao.png, na pasta libs/imagens