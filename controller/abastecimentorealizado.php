<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    $smarty->assign('titulo', 'Abastecimentos Realizados');
    $smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
    $smarty->display('./headers/header.tpl');
    $smarty->display($menu);
    $smarty->display('abastecimentorealizado.tpl');
    $smarty->display('./footer/footer.tpl');
}
