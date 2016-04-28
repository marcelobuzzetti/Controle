<?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$id_marca = addslashes($_GET['marca']);

$rs = mysql_query("SELECT * FROM  modelos WHERE id_marca = $id_marca");
if (mysql_num_rows($rs) > 0) {
    echo "<select class='form-control' name='modelo' id='modeo' required='required'>";
    echo "<option value='' disabled selected>Selecione o Modelo</option>";
    while ($reg = mysql_fetch_object($rs)) {
        echo "<option value=$reg->id_modelo>$reg->descricao</option>";
    }
    echo "</select>";
} else {
    echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
    echo "<option value='' disabled selected>Sem Modelos</option>";
    echo "</select>";
}
?>