<?php

session_start();

if (!isset($_SESSION['login'])) {
    session_unset();
    header('Location: ..');
} else {
    require_once('../libs/smarty/Smarty.class.php');
    include_once("../configs/autoload.php");
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    include '../class/relacao.php';
    
    $viaturas = new Viatura();
    $tabela_relacao_viaturas = $viaturas->listarViaturasPercursos();

    $percursos = new Percurso();
    $tabela_relacao_viaturas_fechadas = $percursos->listarPercursosFechadas();

    $motoristas = new Motorista();
    $relacao_motoristas = $motoristas->listarMotoristas();

    $relacao_viaturas = $viaturas->listarViaturasPercursosDisponiveis();

    $smarty = new Smarty();
    $smarty->assign('contador', $contador);
    $smarty->assign('tabela_relacao_vtr', $tabela_relacao_viaturas);
    $smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_viaturas_fechadas);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('../templates/headers/headerPercursos.tpl');

    switch ($_SESSION['perfil']) {
        case 1:
            $smarty->display('../templates/menus/menuAdmin.tpl');
            break;
        case 2:
            $smarty->display('../templates/menus/menuOperador.tpl');
            break;
        case 3:
            $smarty->display('../templates/menus/menuMntGaragem.tpl');
            break;
        case 4:
            $smarty->display('../templates/menus/menuMntS4.tpl');
            break;
        default:
    }

    $smarty->display('../templates/percursos/index.tpl');
}
?>