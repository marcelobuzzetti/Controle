<?php

$endereco = $_SERVER['SERVER_NAME'];

define("HOST", "http://" . $endereco);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$smarty = new Smarty();
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/view/';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/templates_c/';
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/cache/';
$smarty->assign('HOST', constant("HOST"));

/*Criar um contador de acesso de páginas do usuário
 echo $url = $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];

 echo "<script>window.alert(window.location.href)</script>";
  
  */