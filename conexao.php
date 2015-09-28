<?php
    $pdo = new PDO("mysql:host=localhost;dbname=controle", "usurio", "senha"); 
        if(!$pdo){
            die("Erro ao criar a conexão");
        }
 ?>
