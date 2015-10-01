<?php

$endereco = '/controle1';

session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)) {
    header('Location: ../percursos');
}
?>