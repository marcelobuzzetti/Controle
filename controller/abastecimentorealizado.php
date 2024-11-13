<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    header('Location: /percurso');
} else {

    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();

    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos_especiais = $abastecimentos->listarAbastecimentosEspeciais();


    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $perfil = $_SESSION['perfil'];

    $smarty->assign('perfil', $perfil);
    $smarty->assign('titulo', 'Abastecimentos Realizados');
    $smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
    $smarty->assign('tabela_relacao_abastecimentos_especiais', $tabela_relacao_abastecimentos_especiais);
    $smarty->assign('login', $_SESSION['login']);
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
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('abastecimentorealizado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
