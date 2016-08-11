<?php

include '../include/config.inc.php';
$id = $_POST['id'];
session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5) || isset($id) == FALSE) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->detalharViatura($id);
    
    $relacao_percursos = $viaturas->listarPercursos($id);
    
    $relacao_motoristas = $viaturas->listarMotorista($id);
    
    $relacao_acidentes = $viaturas->listarAcidente($id);
    
    $relacao_manutencao = $viaturas->listarMnt($id);
    
    $relacao_abastecimentos = $viaturas->listarAbastecimentos($id);
    
    $relacao_alteracao = $viaturas->listarAlteracaoVtr($id);

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('titulo', 'Viatura '.$relacao_viaturas[0]['marca'].' '.$relacao_viaturas[0]['modelo'].' '.$relacao_viaturas[0]['placa'].'  Detalhada ');
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('relacao_percursos', $relacao_percursos);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_manutencao', $relacao_manutencao);
    $smarty->assign('relacao_acidentes', $relacao_acidentes);
    $smarty->assign('relacao_abastecimentos', $relacao_abastecimentos);
    $smarty->assign('relacao_alteracao', $relacao_alteracao);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('detalheviatura.tpl');
    $smarty->display('./footer/footer_detalhes.tpl');
}
?>