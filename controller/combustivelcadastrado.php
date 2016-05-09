<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $combustiveis = new Combustivel();
    $relacao_combustiveis = $combustiveis->listarCombustiveis();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Combustíveis Cadastrados');
    $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('combustivelcadastrado.tpl');
    $smarty->display('./footer/footer_combustivel.tpl');
}