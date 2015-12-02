<?php
define("HOST", "http://".$_SERVER['SERVER_NAME'].'/Site');
require_once $_SERVER['DOCUMENT_ROOT'].'/Site/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/Site/model/conexao.php';

 $smarty = new Smarty();
 $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/view/';
 $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/templates_c/';
 $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/cache/';
 $smarty->assign('HOST',  constant("HOST"));

