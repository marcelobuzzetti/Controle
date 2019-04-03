<?php

include 'conexao.php';

$combustivel = $_GET['combustivel'];
$tp = $_GET['tp'];
$stmt = $pdo->prepare("SELECT cr.combustivel AS combustivel, cr.tipo_combustivel AS tipo_combustivel, cr.qnt - ca.qnt AS qnt
                                    FROM combustivel_abastecido ca, combustivel_recebido cr, combustiveis c, tipos_combustiveis tc
                                    WHERE cr.combustivel = ca.combustivel
                                    AND cr.tipo_combustivel = ca.tipo_combustivel
                                    AND c.descricao = ca.combustivel
                                    AND tc.descricao = ca.tipo_combustivel
                                    AND c.id_combustivel = ?
                                    and tc.id_tipo_combustivel = ?
                                    GROUP BY cr.combustivel, cr.tipo_combustivel");
$stmt->bindParam(1, $combustivel, PDO::PARAM_INT);
$stmt->bindParam(2, $tp, PDO::PARAM_INT);
$executa = $stmt->execute();

if ($executa) {
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    echo "<script> $('#qnt').attr('max','$resultado->qnt');</script>";
}
?>