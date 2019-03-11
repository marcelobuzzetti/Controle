<?php

include 'conexao.php';

$id_viatura = addslashes($_GET['viatura']);
$stmt = $pdo->prepare("SELECT categoria, ordem
FROM habilitacoes, viaturas, modelos
WHERE viaturas.id_modelo = modelos.id_modelo
AND viaturas.id_habilitacao = habilitacoes.id_habilitacao
AND viaturas.id_viatura = $id_viatura");
$executa = $stmt->execute();
$teste = $stmt->fetchAll(PDO::FETCH_ASSOC);
$categoria = $teste[0]['categoria'];
$ordem = $teste[0]['ordem'];
if ($categoria == "A") {
    $stmt = $pdo->prepare("SELECT id_motorista, apelido , id_status FROM motoristas, habilitacoes
    WHERE id_status != 2 
    AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
    AND categoria like '%$categoria%'
    AND id_status != 2
    ORDER BY apelido");
    $executa = $stmt->execute();
    $teste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($teste) > 0) {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Selecione o Motoristas</option>";
        foreach($teste as $t){
            $id = $t['id_motorista'];
            $apelido = $t['apelido'];
            echo "<option value=$id_motorista>$apelido</option>";
        }
        echo "</select>";
    } else {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Sem motoristas habilitados</option>";
        echo "</select>";
    }
} else {
    $stmt = $pdo->prepare("SELECT id_motorista, apelido FROM motoristas, habilitacoes
    WHERE id_status != 2 
    AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
    AND (categoria like '%$categoria%' OR ordem >= $ordem)
    ORDER BY apelido");
    $executa = $stmt->execute();
    $teste = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($teste) > 0) {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Selecione o Motoristas</option>";
        foreach($teste as $t){
            $id = $t['id_motorista'];
            $apelido = $t['apelido'];
            echo "<option value='$id'>$apelido</option>";
        }
        echo "</select>";
    } else {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Sem motoristas habilitados</option>";
        echo "</select>";
    }
}
?>