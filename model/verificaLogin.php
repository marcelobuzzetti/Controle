<?php

include '../model/conexao.php';

$login = htmlentities($_GET['login']);

$stmt = $pdo->prepare("SELECT count(id_usuario) AS qnt FROM usuarios WHERE login =  ?");
$stmt->bindParam(1, $login, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($login == NULL) {
    echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Preencha com um Login
        </div>";
    echo "<script> $('#enviar').attr('disabled','disabled'); $('#login').attr('style','border-color: red;');</script>";
} else {
    if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O login $login já está cadastrado
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled'), $('#login').attr('style','border-color: red;');</script>";
    } else {
        echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O login $login não está cadastrado
        </div>";
        echo "<script> $('#enviar').removeAttr('disabled'), $('#login').removeAttr('style');</script>";
    }
}
?>