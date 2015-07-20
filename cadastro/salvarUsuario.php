<?php
include 'conexao.php';

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$stmt = $pdo->prepare('INSERT INTO usuario VALUES (NULL,?, ?,NULL)');
$stmt->bindParam(1, $login , PDO::PARAM_STR);
$stmt->bindParam(2, $senha , PDO::PARAM_STR);
$executa = $stmt->execute();

if(!$executa ){
    echo 'Erro!';
}else{
    echo 'Sucesso!';
}