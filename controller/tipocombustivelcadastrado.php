<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) && ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipos_combustiveis = $tipos_combustiveis->listarTiposCombustiveis();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
    
    $smarty->assign('titulo', 'Tipo de Combustíveis Cadastrados');
    $smarty->assign('relacao_tipos_combustiveis', $relacao_tipos_combustiveis);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('tipocombustivelcadastrado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}