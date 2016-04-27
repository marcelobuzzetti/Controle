<?php
include '../model/conexao.php';

$id_marca = $_GET['marca_modelo'];
$modelo = $_GET['modelo'];

$stmt = $pdo->prepare("SELECT count(id_modelo) AS qnt FROM modelos WHERE id_marca =  ? AND descricao = ?");
$stmt->bindParam(1, $id_marca, PDO::PARAM_INT);
$stmt->bindParam(2, $modelo, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($id_marca == NULL || $modelo == NULL) {
    if ($id_marca == NULL) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Escolha a marca
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    }

    if ($modelo == NULL) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Preencha o modelo
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    }
} else {
    if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo $modelo já está cadastrada
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    } else {
        echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo $modelo não está cadastrada
        </div>";
        echo "<script> $('#enviar').removeAttr('disabled');</script>";
    }
}
?>