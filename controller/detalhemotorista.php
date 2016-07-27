<?php

include '../include/config.inc.php';
$id = $_POST['id'];
session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5) || isset($id) == FALSE) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotorista($id);
    
    $relacao_percursos = $motoristas->listarPercursos($id);

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Motorista '.$tabela_motoristas_cadastrados[0]['apelido']);
    $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
     $smarty->assign('relacao_percursos', $relacao_percursos);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('detalhemotorista.tpl');
    $smarty->display('./footer/footer_detalhes.tpl');
}
?>