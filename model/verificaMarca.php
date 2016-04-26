<?php

mysql_connect('localhost', 'controle', 'controle') or die('Erro ao conectar com o servidor');
mysql_select_db('controle') or die('Erro ao conectar com o banco de dados');
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$marca = $_GET['marca'];
$query = mysql_query("SELECT count(descricao) FROM marcas WHERE descricao =  '$marca'");
$row = mysql_fetch_row($query);
$qnt = $row[0];
if($marca == NULL){
    echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Preencha com uma marca
        </div>";
     echo "<script> $('#enviar').attr('disabled','disabled');</script>";
} else {
if ($qnt > 0) {
        echo "<div class='container'>
        <div class='alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca $marca já está cadastrada
        </div>";
         echo "<script> $('#enviar').attr('disabled','disabled');</script>";
    } else {
      echo "<div class='container'>
        <div class='alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca $marca não está cadastrada
        </div>";    
      echo "<script> $('#enviar').removeAttr('disabled');</script>";
    }
}
?>