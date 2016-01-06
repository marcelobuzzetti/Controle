<?php

$pdo = new PDO("mysql:host=localhost;dbname=controle", "controle", "controle");
if (!$pdo) {
    die("Erro ao criar a conexão");
}

//Lidando com caracteres especiais
$stmt = $pdo->prepare("SET NAMES 'utf8'");
$executa = $stmt->execute();
            
$stmt = $pdo->prepare('SET character_set_connection=utf8');
$executa = $stmt->execute();
            
$stmt = $pdo->prepare('SET character_set_client=utf8');
$executa = $stmt->execute();
            
$stmt = $pdo->prepare('SET character_set_results=utf8');
$executa = $stmt->execute();
//Lidando com caracteres especiais
?>
