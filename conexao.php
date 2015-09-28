<?php
    $pdo = new PDO("mysql:host=localhost;dbname=controle", "usuario", "senha"); 
        if(!$pdo){
            die("Erro ao criar a conexão");
        }
 ?>
