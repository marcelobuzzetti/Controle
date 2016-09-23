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

    $relacao_viaturas = $motoristas->listarViatura($id);

    $relacao_acidentes = $motoristas->listarAcidente($id);

    $relacao_abastecimentos = $motoristas->listarAbastecimentos($id);

    $km = $motoristas->listarKm($id);

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Motorista ' . $tabela_motoristas_cadastrados[0]['apelido']);
    $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
    $smarty->assign('km', $km[0]['KM']);
    $smarty->assign('relacao_percursos', $relacao_percursos);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('relacao_acidentes', $relacao_acidentes);
    $smarty->assign('relacao_abastecimentos', $relacao_abastecimentos);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('detalhemotorista.tpl');
    $smarty->display('./footer/footer_detalhes.tpl');
}
?>