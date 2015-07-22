<?php
    session_start();
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    if(!isset($_SESSION['login'])){
       header('Location: '.$endereco.'');
        die();
    }
?>