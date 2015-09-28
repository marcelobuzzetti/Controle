<?php
    $endereco = '/controle';   
    
    session_start();
    
     if(!isset($_SESSION['login'])){
        header ('Location: '.$endereco.'/percurso');
    }
?>