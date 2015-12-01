<?php
define("PATH", "");
define("HOST", "http://".$_SERVER['SERVER_NAME'].constant("PATH"));
require_once $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/model/conexao.php';

 $smarty = new Smarty();
 $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/view/';
 $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/templates_c/';
 $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/cache/';
 $smarty->assign('HOST',  constant("HOST"));

