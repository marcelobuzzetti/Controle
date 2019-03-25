<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 2)) {
    session_unset();
    header('Location: ' . constant("HOST"));
} else {

    $viaturas = new Viatura();
    $tabela_relacao_viaturas = $viaturas->listarViaturasPercursos();

    $percursos = new Percurso();
    $tabela_relacao_viaturas_fechadas = $percursos->listarPercursosFechadas();

    $motoristas = new Motorista();
    $relacao_motoristas = $motoristas->listarMotoristas();

    $relacao_viaturas = $viaturas->listarViaturasPercursosDisponiveis();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('HOST', constant("HOST"));
    $smarty->assign('titulo', 'Controle de Saída de Viatura');
    if (!empty($contador)) {$smarty->assign('contador', $contador);}
    $smarty->assign('tabela_relacao_vtr', $tabela_relacao_viaturas);
    $smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_viaturas_fechadas);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
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
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('percurso.tpl');
    $smarty->display('./footer/footer_percursos.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
}
?>