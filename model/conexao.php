<?php
include $_SERVER['DOCUMENT_ROOT'] . '/env.php';
$host = $variables['DB_HOST'];
$db = $variables['DB_DATABASE'];
$user = $variables['DB_USERNAME'];
$password = $variables['DB_PASSWORD'];
/*require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();
$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_DATABASE'];
$user = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];  */

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 /*    if (!$pdo) {
        die("Erro ao criar a conexão");
    } */

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
