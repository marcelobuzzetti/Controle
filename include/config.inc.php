<?php

$endereco = $_SERVER['SERVER_NAME'];
$porta = $_SERVER['SERVER_PORT'];

/* define("HOST", "http://" . $endereco . ($porta ? ":".$porta : "")); */

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$smarty = new Smarty();
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/view/';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/templates_c/';
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/cache/';
/* $smarty->assign('HOST', constant("HOST")); */


session_start();
if(!empty($_SESSION['key'])){
    $smarty->assign('token', $_SESSION['key']);
} else {
    $_SESSION['key'] = md5(uniqid(rand(), TRUE));
    $smarty->assign('token', $_SESSION['key']);
}
