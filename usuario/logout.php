<?php
    session_start();

    if(isset($_SESSION['login'])){
        unset($_SESSION['login']);
    }
    
    header("Location: ../index.php");
?>