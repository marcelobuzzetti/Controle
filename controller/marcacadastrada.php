<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $marcas = new Marca();
    $relacao_marcas = $marcas->listarMarcas();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Marcas Cadastradas');
    $smarty->assign('relacao_marcas', $relacao_marcas);
    $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    $smarty->assign('atualizado', $_SESSION['atualizado']);
    $smarty->assign('apagado', $_SESSION['apagado']);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('marcacadastrada.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
        