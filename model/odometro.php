<?php

include '../model/conexao.php';

$id_viatura = $_GET['viatura'];
$stmt = $pdo->prepare("SELECT MAX(odo_retorno) AS qnt FROM percursos WHERE id_viatura = ?");
$stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
$executa = $stmt->execute();

if ($executa) {
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    if ($resultado->qnt > 0) {
        echo "<script> $('#odo_saida').attr('min','$resultado->qnt');</script>";
    } else {
        $stmt = $pdo->prepare("SELECT odometro FROM viaturas WHERE id_viatura = ?");
        $stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
        $executa = $stmt->execute();
        if ($executa) {
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            echo "<script> $('#odo_saida').attr('min','$resultado->odometro');</script>";
        }
    }
}
?>