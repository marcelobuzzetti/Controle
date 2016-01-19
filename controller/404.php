<?php
include '../include/config.inc.php';
session_start();
$menus = new Menu();
$menu = $menus->SelecionarMenu($_SESSION['perfil']);

$smarty->assign('login', $_SESSION['login']);
$smarty->display('./headers/header.tpl');
$smarty->display($menu);
$smarty->display('./erros/404.tpl');
$smarty->display('./footer/footer.tpl');

?>