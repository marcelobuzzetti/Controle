<?php
    session_start();
    
    if(!isset($_SESSION['login']) || ($_SESSION['perfil'] < 1)){
        header("Location: ../percurso/index.php");
        die();
    }
?>