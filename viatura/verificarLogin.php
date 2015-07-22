<?php
    session_start();
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    if(!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)){
        header('Location: '.$endereco.'/percurso');
        die();
    }
?>