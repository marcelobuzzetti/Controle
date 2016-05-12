<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
header('Location: '. constant("HOST").'/percurso');
} else {

$marcas = new Marca();
$relacao_marcas = $marcas->listarMarcas();

$situacao = new Situacao();
$relacao_situacao = $situacao->listarSituacao();

$viaturas = new Viatura();
$relacao_viaturas = $viaturas->listarViaturasCadastradas();

$menus = new Menu();
$menu = $menus->SelecionarMenu($_SESSION['perfil']);

$smarty->assign('titulo', 'Viaturas Cadastradas');
$smarty->assign('relacao_viaturas', $relacao_viaturas);
$smarty->assign('login', $_SESSION['login']);
$smarty->display('./headers/header_datatables.tpl');
$smarty->display($menu);
$smarty->display('viaturacadastrada.tpl');
$smarty->display('./footer/footer_datatables.tpl');
}
?>