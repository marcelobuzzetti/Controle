<?php

 $endereco = $_SERVER['SERVER_NAME'].'/controle';   
 
    session_start();
    if(!isset($_SESSION['login'])){
        session_unset();
        header ('Location: '.$endereco.'');
    }
?>