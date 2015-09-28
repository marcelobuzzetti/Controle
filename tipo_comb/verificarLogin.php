<?php
    $endereco = $_SERVER['SERVER_NAME'].'/controle';   
    
    session_start();
    
     if(!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)){
        header ('Location: '.$endereco.'/percurso');
    }
?>