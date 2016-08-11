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
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('recebimentocombustivelcadastrado.tpl');
    $smarty->display('./footer/footer_datatables.tpl');
}
?>