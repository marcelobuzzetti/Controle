<?php

include __DIR__ . '/include/config.inc.php';

$login = new Login();
$login->Acesso();

$menus = new Menu();
$menu = $menus->SelecionarMenu($_SESSION['perfil']);

$viatura = new Viatura();
$tabela_relacao_vtr = $viatura->ViaturasRodando();

$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->display('./headers/header_datatables.tpl');
$smarty->display($menu);
$smarty->display('home.tpl');
$smarty->display('./footer/footer_inicio.tpl');
?>