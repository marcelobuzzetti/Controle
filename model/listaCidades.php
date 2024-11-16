<?php

include 'conexao.php';

$estado = $_GET['estado'];

$stmt = $pdo->prepare("SELECT * FROM cidades WHERE id_estado = $estado");
            $executa = $stmt->execute();
            $teste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo "<select class='form-control' name='cidade_natal' id='cidade_natal' required='required'>";
    		echo "<option value='' disabled selected>Selecione a Cidade</option>";
            foreach($teste as $t){
            	echo "<option value=".$t['id_cidade'].">".$t['nome']."</option>";
            }
            // echo "</select>";


/*$rs = mysql_query("SELECT * FROM  cidades WHERE id_estado = $estado");
if (mysql_num_rows($rs) > 0) {
    echo "<select class='form-control' name='cidade_natal' id='cidade_natal' required='required'>";
    echo "<option value='' disabled selected>Selecione a Cidade</option>";
    while ($reg = mysql_fetch_object($rs)) {
        echo "<option value=$reg->id_cidade>$reg->nome</option>";
    }
    echo "</select>";
} else {
    echo "<select class='form-control' name='modelo' id='modelo' required='required'>";
    echo "<option value='' disabled selected>Sem Cidades</option>";
    echo "</select>";
}*/
?>