<?php
        $endereco = $_SERVER['SERVER_NAME'].'/controle';
        
        session_start();
        
        if(!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)){
            header ('Location: '.$endereco.'/percurso');
            
        }
?>