<?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$id_viatura = addslashes($_GET['viatura']);
$query = mysql_query("SELECT categoria, ordem
FROM habilitacoes, viaturas, modelos
WHERE viaturas.id_modelo = modelos.id_modelo
AND viaturas.id_habilitacao = habilitacoes.id_habilitacao
AND viaturas.id_viatura = $id_viatura");
$row = mysql_fetch_row($query);
$categoria = $row[0];
$ordem = $row[1];

if ($categoria == "A") {
    $rs = mysql_query("SELECT id_motorista, apelido , id_status FROM motoristas, habilitacoes
    WHERE id_status != 2 
  
    AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
    AND categoria like '%$categoria%'
    AND id_status != 2
    AND id_motorista NOT IN (SELECT id_motorista FROM percursos WHERE data_retorno IS NULL)
    ORDER BY apelido");
    if (mysql_num_rows($rs) > 0) {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Selecione o Motoristas</option>";
        while ($reg = mysql_fetch_object($rs)) {
            echo "<option value=$reg->id_motorista>$reg->apelido</option>";
        }
        echo "</select>";
    } else {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Sem motoristas habilitados</option>";
        echo "</select>";
    }
} else {
    $rs = mysql_query("SELECT id_motorista, apelido FROM motoristas, habilitacoes
    WHERE id_status != 2 
    
    AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
    AND (categoria like '%$categoria%' OR ordem >= $ordem)
    AND id_motorista NOT IN (SELECT id_motorista FROM percursos WHERE data_retorno IS NULL)
    ORDER BY apelido");
    if (mysql_num_rows($rs) > 0) {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Selecione o Motoristas</option>";
        while ($reg = mysql_fetch_object($rs)) {
            echo "<option value=$reg->id_motorista>$reg->apelido</option>";
        }
        echo "</select>";
    } else {
        echo "<select class='form-control' name='motorista' id='motorista' required='required'>";
        echo "<option value='' disabled selected>Sem motoristas habilitados</option>";
        echo "</select>";
    }
}
?>