<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1)) {
    header('Location: /percurso');
} else {

    $usuario = new Usuario();
    $relacao_usuarios = $usuario->listarUsuarioInativos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Usuários Inativos');
    $smarty->assign('relacao_usuarios', $relacao_usuarios);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('usuariosinativos.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}
