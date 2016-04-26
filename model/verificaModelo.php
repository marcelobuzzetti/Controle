<?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$id_marca = $_GET['marca'];
$modelo = $_GET['modelo'];
$query = mysql_query("SELECT count(id_modelo) FROM modelos WHERE id_marca =  $id_marca AND descricao = '$modelo'");
$row = mysql_fetch_row($query);
$qnt = $row[0];

if ($id_marca == NULL || $modelo == NULL) {
    echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Preencha os camapo
        </div>";
    echo "<script> $('#enviar').attr('disabled','disabled');</script>";
} else {
    if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo $modelo já está cadastrada
        </div>";
        echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    } else {
        echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo $modelo não está cadastrada
        </div>";
        echo "<script> $('#enviar').removeAttr('disabled');</script>";
    }
}
?>