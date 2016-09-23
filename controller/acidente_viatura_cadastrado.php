<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE && ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    session_unset();
    header('Location: ' . constant("HOST"));
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();

    $motorista = new Motorista();
    $relacao_motoristas = $motorista->listarMotoristasCadastrados();

    $acidente = new AcidenteViatura();
    $relacao_acidentes = $acidente->listarAcidenteVtr();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Acidentes de Viaturas Cadastrados');
    $smarty->assign('botao', 'Cadastrar');
    $smarty->assign('evento', 'cadastrar_acidente');
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_acidentes', $relacao_acidentes);
    $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    $smarty->assign('atualizado', $_SESSION['atualizado']);
    $smarty->assign('apagado', $_SESSION['apagado']);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('acidente_viatura_cadastrado.tpl');
    $smarty->display('./footer/footer_acidente.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
