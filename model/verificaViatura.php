<?php

include '../model/conexao.php';

$id_marca = $_GET['marca'];
$id_modelo = $_GET['modelo'];
$placa = $_GET['placa'];

$stmt = $pdo->prepare("SELECT count(id_viatura) AS qnt FROM viaturas WHERE id_marca =  ? AND id_modelo = ? AND placa = ?");
$stmt->bindParam(1, $id_marca, PDO::PARAM_INT);
$stmt->bindParam(2, $id_modelo, PDO::PARAM_INT);
$stmt->bindParam(3, $placa, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($qnt > 0) {
    echo "<div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura já está cadastrada
        </div>";
    echo "<script> $('#enviar').attr('disabled','disabled'), $('#marca').attr('style','border-color: red;'), $('#modelo').attr('style','border-color: red;'), $('#placa').attr('style','border-color: red;');</script>";
} else {
    echo " <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
           A viatura não está cadastrada
        </div>";
    echo "<script> $('#enviar').removeAttr('disabled'), $('#marca').removeAttr('style'), $('#modelo').removeAttr('style'), $('#placa').removeAttr('style');</script>";
}
?>