<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] == 2)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $militares = new Militar();
    $militares_cadastrados = $militares->listarMilitar();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
        
        $smarty->assign('titulo', 'Militares Cadastrados');
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('militarcadastrado.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
