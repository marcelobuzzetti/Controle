<?php

include 'conexao.php';

$id_marca = addslashes($_GET['marca']);

$stmt = $pdo->prepare("SELECT * FROM  modelos WHERE id_marca = $id_marca");
$executa = $stmt->execute();
$teste = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($teste) {
    echo "<select class='form-control' name='modelo' id='modeo' required='required'>";
    echo "<option value='' disabled selected>Selecione o Modelo</option>";
      foreach($teste as $t){
            	echo "<option value=$t['id_modelo']>$t['descricao']</option>";
            }
    echo "</select>";
} else {
    echo "<select class='form-control' name='modelo' id='modelo' required='required'>";
    echo "<option value='' disabled selected>Sem Modelos</option>";
    echo "</select>";
}
?>