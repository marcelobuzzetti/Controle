<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2)) {
    header('Location: /percurso');
} else {

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Motoritas Cadastrados');
    $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
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
    if (!empty($_SESSION['erro'])) {
        $smarty->assign('erro', $_SESSION['erro']);
    } else {
        $smarty->assign('erro', FALSE);
    }
    if(isset($_SESSION['ativado'])){
        $smarty->assign('ativado', $_SESSION['ativado']);
    } else {
        $smarty->assign('ativado', '');
    }
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
