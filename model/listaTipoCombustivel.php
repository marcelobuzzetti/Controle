<?php

include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$combustivel = $_GET['combustivel'];
$stmt = $pdo->prepare("SELECT tc.id_tipo_combustivel AS id_tipo_combustivel, tc.descricao AS descricao
                                    FROM tipos_combustiveis tc, recibos_combustiveis rc 
                                    WHERE tc.id_tipo_combustivel = rc.id_tipo_combustivel 
                                    AND rc.id_combustivel = ?
                                    GROUP BY tc.id_tipo_combustivel");
$stmt->bindParam(1, $combustivel, PDO::PARAM_INT);
$executa = $stmt->execute();

if ($executa) {
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<select class='form-control' id='tp' name='tp' tabindex='6'>
                    <option value='' disabled selected>Selecione o Tipo  de Combustível</option>";
    foreach ($resultado AS $value) {
        echo "<option value=" . $value['id_tipo_combustivel'] . ">" . $value['descricao'] . "</option>";
    }
    echo "</select>";
}
?>