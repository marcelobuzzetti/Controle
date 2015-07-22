<?php
    session_start();
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    if(isset($_SESSION['login'])){
        unset($_SESSION['login']);
        unset($_SESSION['perfil']);
    }
    
   header('Location: '.$endereco.'');
?>