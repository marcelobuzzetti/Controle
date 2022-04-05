<?php

include '../include/config.inc.php';

$menus = new Menu();

$menu = $menus->SelecionarMenu(isset($_SESSION['perfil']) ? $_SESSION['perfil'] : 0);

if(isset($_SESSION['login'])) $smarty->assign('login', $_SESSION['login']);
$smarty->display('./headers/header.tpl');
$smarty->display($menu);
$smarty->display('./erros/404.tpl');
$smarty->display('./footer/footer.tpl');
?>