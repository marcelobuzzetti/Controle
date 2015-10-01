<?php

$endereco = '/controle1';

session_start();

//Inicializando a variavel
$_SESSION['mysql'];
$_SESSION['erro'];
$_SESSION['timeout'];
//Inicializando a variavel

if (!isset($_SESSION['login'])) {
    session_unset();
    header('Location: ' . $endereco . '');
}

if ($_SESSION['temposessao'] < time()) {
    session_start();
    $_SESSION['timeout'] = 1;
    header('Location: ' . $endereco . '');
} else {
    $_SESSION["temposessao"] = time() + 120;
}
?>