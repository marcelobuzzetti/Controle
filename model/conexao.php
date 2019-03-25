<?php
include $_SERVER['DOCUMENT_ROOT'] . '/env.php';
$host = $variables['DB_HOST'];
$db = $variables['DB_DATABASE'];
$user = $variables['DB_USERNAME'];
$password = $variables['DB_PASSWORD'];
$pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "$password");
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
