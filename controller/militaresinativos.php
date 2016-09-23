<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $militares = new Militar();
    $militares_cadastrados = $militares->listarMilitarInativo();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Militares Inativos');
    $smarty->assign('militares_cadastrados', $militares_cadastrados);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('militarinativo.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}
