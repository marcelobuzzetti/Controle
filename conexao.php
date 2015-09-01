<?php
    $pdo = new PDO("mysql:host=localhost;dbname=controle", "", ""); 
        if(!$pdo){
            die("Erro ao criar a conexão");
        }
 ?>
