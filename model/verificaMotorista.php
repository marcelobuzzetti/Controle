<?php
include '../model/conexao.php';

$nome = $_GET['nome'];
$pg = $_GET['pg'];

$stmt = $pdo->prepare("SELECT count(id_motorista) AS qnt FROM motoristas WHERE nome =  ? AND id_posto_grad = ?");
$stmt->bindParam(1, $nome, PDO::PARAM_STR);
$stmt->bindParam(2, $pg, PDO::PARAM_INT);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;
    if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O motorista já está cadastrado
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    } else {
        echo "<script> $('#enviar').removeAttr('disabled');</script>";
    }
?>