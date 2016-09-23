<?php

include '../include/config.inc.php';

session_start();
$login = $_SESSION['usuario'];

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $militar = new Militar();
    $relacao_militares = $militar->listarMilitarUsuario();

    $usuarios = new Usuario();
    $relacao_usuarios = $usuarios->listarUsuario($login);

    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Usuários Cadastrados');
    $smarty->assign('relacao_usuarios', $relacao_usuarios);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    $smarty->assign('atualizado', $_SESSION['atualizado']);
    $smarty->assign('apagado', $_SESSION['apagado']);
    $smarty->assign('erro', $_SESSION['erro']);
    $smarty->assign('ativado', $_SESSION['ativado']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('usuarioscadastrados.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro']);
    unset($_SESSION['ativado']);
}