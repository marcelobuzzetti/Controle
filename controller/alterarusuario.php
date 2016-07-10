<?php

include '../include/config.inc.php';

session_start();
$login = $_SESSION['usuario'];

if (isset($_SESSION['login']) == FALSE) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

     $militar = new Militar();
     
    $usuarios = new Usuario();
    $relacao_usuarios = $usuarios->listarUsuario($login);

    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $relacao_militares = $militar->listarMilitar();
    $usuario = $usuarios->listarUsuarioAtualizar($login);
    
    $smarty->assign('titulo', 'Atualizar de Usuários');
    $smarty->assign('botao', 'Atualizar');
    $smarty->assign('update', $update);
    $smarty->assign('id_usuario', $usuario[0]['id_usuario']);
    $smarty->assign('militar', $usuario[0]['id_militar']);
    $smarty->assign('perfil', $usuario[0]['id_perfil']);
    $smarty->assign('login1', $usuario[0]['login']);
    $smarty->assign('apelido', $usuario[0]['nome']);
    $smarty->assign('relacao_usuarios', $relacao_usuarios);
    $smarty->assign('relacao_militares', $relacao_militares);
    $smarty->assign('relacao_perfis', $relacao_perfis);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('alterarusuario.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}
