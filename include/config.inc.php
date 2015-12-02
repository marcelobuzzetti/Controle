<?php

define("HOST", "http://".$_SERVER['SERVER_NAME']);
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/model/conexao.php';

 $smarty = new Smarty();
 $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/view/';
 $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/templates_c/';
 $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/cache/';
 $smarty->assign('HOST',  constant("HOST"));

