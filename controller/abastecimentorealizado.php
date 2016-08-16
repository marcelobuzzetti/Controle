<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();
    
    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos_especiais = $abastecimentos->listarAbastecimentosEspeciais();


    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    $smarty->assign('titulo', 'Abastecimentos Realizados');
    $smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
    $smarty->assign('tabela_relacao_abastecimentos_especiais', $tabela_relacao_abastecimentos_especiais);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    $smarty->assign('atualizado', $_SESSION['atualizado']);
    $smarty->assign('apagado', $_SESSION['apagado']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('abastecimentorealizado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
