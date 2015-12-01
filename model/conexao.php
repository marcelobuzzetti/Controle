<?php

$pdo = new PDO("mysql:host=localhost;dbname=controle1", "controle1", "controle1");
if (!$pdo) {
    die("Erro ao criar a conexão");
}

?>
