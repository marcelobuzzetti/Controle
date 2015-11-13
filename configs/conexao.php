<?php

$pdo = new PDO("mysql:host=localhost;dbname=controle", "root", "");
if (!$pdo) {
    die("Erro ao criar a conexão");
}

?>
