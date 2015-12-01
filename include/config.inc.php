<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Site/vendor/autoload.php';

 $smarty = new Smarty();
 $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/view/';
 $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/templates_c/';
 $smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/cache/';
