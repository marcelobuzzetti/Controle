<?php

include '../include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 4)) {
    header('Location: /percurso');
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
    $smarty->display('./footer/footer_datatables.tpl');
}