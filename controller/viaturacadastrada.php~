<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $marcas = new Marca();
    $relacao_marcas = $marcas->listarMarcas();

    $situacao = new Situacao();
    $relacao_situacao = $situacao->listarSituacao();

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturasCadastradas();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Viaturas Cadastradas');
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
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
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('viaturacadastrada.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro']);
}
?>