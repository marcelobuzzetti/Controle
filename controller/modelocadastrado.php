<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $marcas = new Marca();
    $relacao_marcas = $marcas->listarMarcas();

    $modelos = new Modelo();
    $tabela_modelos_cadastrados = $modelos->listarModelos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Modelos Cadastrados');
    $smarty->assign('relacao_marcas', $relacao_marcas);
    $smarty->assign('tabela_modelos_cadastrados', $tabela_modelos_cadastrados);
    if (!empty($_SESSION['cadastrado'])) {
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    } else {
        $smarty->assign('cadastrado', FALSE);
    }
    if (!empty($_SESSION['atualizado'])) {
        $smarty->assign('atualizado', $_SESSION['atualizado']);
    } else {
        $smarty->assign('atualizado', FALSE);
    }
    if (!empty($_SESSION['apagado'])) {
        $smarty->assign('apagado', $_SESSION['apagado']);
    } else {
        $smarty->assign('apagado', FALSE);
    }
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('modelocadastrado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
