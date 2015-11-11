<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../percurso');
} else {
    
    require_once('../libs/smarty/Smarty.class.php');
    include_once("../configs/autoload.php");
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    include '../class/relacao.php';
    
    $verificador = 0;
    
    if(!isset($_POST['data_inicio'])){
        
        $smarty = new Smarty();
        $smarty->assign('verificador',$verificador);
        $smarty->assign('titulo','Relatórios');
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('../templates/headers/header.tpl');

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

        $smarty->display('../templates/relatorios/index.tpl');    
        
        } else {
        
        $verificador = 1;
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        
        $relatorios = new Relatorio();
        $relacao_relatorio = $relatorios->listarPercursos($data_inicio, $data_fim);
        
        $smarty = new Smarty();
        $smarty->assign('verificador',$verificador);
        $smarty->assign('titulo','Relatórios de '.$data_inicio.' a '.$data_fim);
        $smarty->assign('relacao_relatorio',$relacao_relatorio);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('../templates/headers/header.tpl');

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

        $smarty->display('../templates/relatorios/index.tpl');
        
    }
}
?>