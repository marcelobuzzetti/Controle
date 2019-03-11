<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $militares = new Militar();
    $militares_cadastrados = $militares->listarMilitar();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Militares Cadastrados');
    $smarty->assign('militares_cadastrados', $militares_cadastrados);
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
    if (!empty($_SESSION['ativado'])) {
        $smarty->assign('ativado', $_SESSION['ativado']);
    } else {
        $smarty->assign('ativado', FALSE);
    }
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('militarcadastrado.tpl');
    $smarty->display('./footer/footer_militar.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro']);
    unset($_SESSION['ativado']);
}
