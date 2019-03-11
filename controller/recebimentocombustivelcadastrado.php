<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 4)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $rcb_combustiveis = new RecebimentoCombustivel();
    $relacao_rcb_combustiveis = $rcb_combustiveis->listarRecebimentoCombustiveis();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Recebimento de Combustíveis Cadastrados');
    $smarty->assign('relacao_rcb_combustiveis', $relacao_rcb_combustiveis);
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
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('recebimentocombustivelcadastrado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro']);
}
?>