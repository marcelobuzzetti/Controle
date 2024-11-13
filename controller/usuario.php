<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


$login = $_SESSION['usuario'];

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1)) {
    header('Location: /percurso');
} else {

    $militar = new Militar();
    $relacao_militares = $militar->listarMilitarUsuario();

    $usuarios = new Usuario();
    $relacao_usuarios = $usuarios->listarUsuario($login);

    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('update', '');
        $smarty->assign('id_usuario', '');
        $smarty->assign('militar', '');
        $smarty->assign('perfil', '');
        $smarty->assign('login1', '');
        $smarty->assign('apelido', '');
        $smarty->assign('titulo', 'Cadastro de Usuários');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_usuario');
        $smarty->assign('relacao_militares', $relacao_militares);
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_perfis', $relacao_perfis);
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
        $smarty->display('usuario.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
        unset($_SESSION['erro']);
        unset($_SESSION['ativado']);
    } else {
        $id = $_POST['id'];
        $update = "disabled";

        $relacao_militares = $militar->listarMilitar();
        $usuarios = $usuarios->listarUsuarioAtualizar($id);

        $smarty->assign('titulo', 'Atualizar de Usuários');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_usuario');
        $smarty->assign('update', $update);
        $smarty->assign('id_usuario', $usuarios[0]['id_usuario']);
        $smarty->assign('militar', $usuarios[0]['id_militar']);
        $smarty->assign('perfil', $usuarios[0]['id_perfil']);
        $smarty->assign('login1', $usuarios[0]['login']);
        $smarty->assign('apelido', $usuarios[0]['nome']);
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_militares', $relacao_militares);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('usuario.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}