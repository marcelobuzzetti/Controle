<?php
    $pdo = new PDO("mysql:host=localhost;dbname=controle", "root", "apollo87"); 
     if(!$pdo){
           die("Erro ao criar a conexão");
     }
 ?>
