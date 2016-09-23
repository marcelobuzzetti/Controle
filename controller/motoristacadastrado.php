<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Motoritas Cadastrados');
    $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    $smarty->assign('atualizado', $_SESSION['atualizado']);
    $smarty->assign('apagado', $_SESSION['apagado']);
    $smarty->assign('erro', $_SESSION['erro']);
    $smarty->assign('ativado', $_SESSION['ativado']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('motoristacadastrado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro']);
    unset($_SESSION['ativado']);
}
