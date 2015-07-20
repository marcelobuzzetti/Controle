<?php
    session_start();

    if(isset($_SESSION['login'])){
        unset($_SESSION['login']);
        unset($_SESSION['perfil']);
    }
    
    header("Location: ../index.php");
?>