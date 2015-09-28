<?php

 $endereco = '/controle';   
 
    session_start();
    if(!isset($_SESSION['login'])){
        session_unset();
        header ('Location: '.$endereco.'');
    }
?>