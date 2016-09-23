<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotoristasInativos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Motoritas Inativos');
    $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('motoristasinativos.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}
