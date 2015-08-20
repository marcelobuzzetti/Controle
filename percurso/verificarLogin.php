<?php

 $endereco = $_SERVER['SERVERNAME'].'/controle';   
 
    session_start();
    if(!isset($_SESSION['login'])){
        session_unset();
        header ('Location: '.$endereco.'');
    }
?>