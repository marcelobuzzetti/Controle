<?php
    $endereco = $_SERVER['SERVER_NAME'].'/controle';   
    
    session_start();
    
     if(!isset($_SESSION['login'])){
        header ('Location: '.$endereco.'/percurso');
    }
?>