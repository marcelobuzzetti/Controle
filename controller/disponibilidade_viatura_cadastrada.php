<?php

include '../include/config.inc.php';



if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    session_unset();
    header('Location: /percurso');
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();

    $alteracao = new AlteracaoViatura();
    $relacao_alteracao = $alteracao->listarDisponibilidadeVtr();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Indisponibilidades de Viaturas Cadastradas');
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('relacao_alteracao', $relacao_alteracao);
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
    $smarty->display('disponibilidade_viatura_cadastrada.tpl');
    $smarty->display('./footer/footer_disponibilidade.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}