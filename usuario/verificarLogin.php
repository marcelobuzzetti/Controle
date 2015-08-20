<?php
        $endereco = $_SERVER['SERVERNAME'].'/controle';
        
        session_start();
        
        if(!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)){
            header ('Location: '.$endereco.'/percurso');
            
        }
?>