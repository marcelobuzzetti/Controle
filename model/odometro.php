<?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$id_viatura = addslashes($_GET['viatura']);
$query = mysql_query("SELECT MAX(odo_retorno) FROM percursos WHERE id_viatura = $id_viatura");
$row = mysql_fetch_row($query);
$odometro = $row[0];
if ($odometro > 0) {
    echo "<script> $('#odo_saida').attr('min','$odometro');</script>";
} else {
    echo "<script> $('#odo_saida').attr('min','0');</script>";
}

?>