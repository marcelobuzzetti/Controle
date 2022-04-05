<?php

include 'conexao.php';

$combustivel = $_GET['combustivel'];
$tp = $_GET['tp'];
$qnt = $_GET['qnt'];
$stmt = $pdo->prepare("SELECT cr.combustivel AS combustivel, cr.tipo_combustivel AS tipo_combustivel, ((cr.qnt - (ca.qnt + ce.qnt)) - ?) AS qnt
                                    FROM combustivel_abastecido ca, combustivel_recebido cr, combustiveis c, tipos_combustiveis tc, combustivel_especial ce
                                    WHERE cr.combustivel = ca.combustivel
                                    AND cr.tipo_combustivel = ca.tipo_combustivel									AND ce.combustivel = ca.combustivel
                                    AND ce.tipo_combustivel = ca.tipo_combustivel
                                    AND c.descricao = ca.combustivel
                                    AND tc.descricao = ca.tipo_combustivel
                                    AND c.id_combustivel = ?
                                    and tc.id_tipo_combustivel = ?
                                    ");
$stmt->bindParam(1, $qnt, PDO::PARAM_INT);
$stmt->bindParam(2, $combustivel, PDO::PARAM_INT);
$stmt->bindParam(3, $tp, PDO::PARAM_INT);
$executa = $stmt->execute();

if ($executa) {
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    if ($resultado->qnt != NULL) {
        echo "<div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Restam $resultado->qnt lts de $resultado->combustivel $resultado->tipo_combustivel
        </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Selecione o Combustível e o Tipo de Combustível
        </div>";
    }
}
?>