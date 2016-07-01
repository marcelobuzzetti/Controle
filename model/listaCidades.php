    <?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$estado = $_GET['estado'];

$rs = mysql_query("SELECT * FROM  cidades WHERE id_estado = $estado");
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
}
?>