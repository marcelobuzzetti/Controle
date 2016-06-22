<?php

include '../model/conexao.php';

$marca = htmlentities($_GET['marca']);

$stmt = $pdo->prepare("SELECT count(descricao) AS qnt FROM marcas WHERE descricao =  ?");
$stmt->bindParam(1, $marca, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($marca == NULL) {
    echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Preencha com uma marca
        </div>";
    echo "<script> $('#enviar').attr('disabled','disabled');</script>";
} else {
    if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca $marca já está cadastrada
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled'), $('#marca').attr('style','border-color: red;');</script>";
    } else {
        echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca $marca não está cadastrada
        </div>";
        echo "<script> $('#enviar').removeAttr('disabled'), $('#marca').removeAttr('style');</script>";
    }
}
?>