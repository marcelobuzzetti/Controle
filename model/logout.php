<?php



if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
    unset($_SESSION['perfil']);
    unset($_SESSION['temposessao']);
}
session_unset();
header('Location: /');
?>