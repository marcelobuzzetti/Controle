<?php

 $endereco = $_SERVER['SERVERNAME'].'/controle';   
 
    session_start();
    if(!isset($_SESSION['login'])){
        session_unset();
        header ('Location: '.$endereco.'');
    }
    
 if($_SESSION['temposessao'] < time()){
       session_start();
        $_SESSION['timeout'] = 1;
       header ('Location: '.$endereco.'');
    } else {
        $_SESSION["temposessao"] = time() + 120;
    }
?>