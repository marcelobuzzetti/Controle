<?php

include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$combustivel = htmlspecialchars($_GET['descricao']);

$stmt = $pdo->prepare("SELECT count(id_tipo_combustivel) AS qnt FROM tipos_combustiveis WHERE descricao =  ?");
$stmt->bindParam(1, $combustivel, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($qnt > 0) {
    echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O combustível $combustivel já está cadastrada
        </div>";
    echo "<script> $('#enviar').attr('disabled','disabled'), $('#descricao_tipo').attr('style','border-color: red;');</script>";
} else {
    echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O combustível $combustivel não está cadastrada
        </div>";
    echo "<script> $('#enviar').removeAttr('disabled'), $('#descricao_tipo').removeAttr('style');</script>";
}
?>