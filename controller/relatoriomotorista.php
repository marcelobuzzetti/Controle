<?php

include '../include/config.inc.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $verificador = 0;

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if ($_POST['enviar'] == "relatorio_completo") {

        $verificador = 1;

        $relatorios = new Relatorio();
        $relacao_relatorio = $relatorios->listarMotoristaCompleto();

        foreach ($relacao_relatorio as $value) {
            $a .= '"' . $value['apelido'] . '"' . ',';
        }
        foreach ($relacao_relatorio as $value) {
            $b .= $value['qnt'] . ',';
        }
        foreach ($relacao_relatorio as $value) {
            $c .= $value['KM'] . ',';
        }

        $smarty->assign('verificador', $verificador);
        $smarty->assign('titulo1', 'Relatório Completo de Motoristas');
        $smarty->assign('titulo', 'Relatório de Utilizaçao de Motorista por Periodo');
        $smarty->assign('relacao_relatorio', $relacao_relatorio);
        $smarty->assign('a', $a);
        $smarty->assign('b', $b);
        $smarty->assign('c', $c);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('relatoriomotorista.tpl');
        $smarty->display('./footer/footer_relatorio_grafico.tpl');
        
    } else {

        if (!isset($_POST['data_inicio'])) {

            $smarty->assign('verificador', $verificador);
            $smarty->assign('titulo', 'Relatório de Utilizaçao de Motorista por Periodo');
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header_datatables.tpl');
            $smarty->display($menu);
            $smarty->display('relatoriomotorista.tpl');
            $smarty->display('./footer/footer_relatorio_grafico.tpl');
        } else {

            $verificador = 1;
            $data_inicio = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_inicio'])));
            $data_fim = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_fim'])));


            $relatorios = new Relatorio();
            $relacao_relatorio = $relatorios->listarMotoristaUtilizacao($data_inicio, $data_fim);
            foreach ($relacao_relatorio as $value) {
                $a .= '"' . $value['apelido'] . '"' . ',';
            }
            foreach ($relacao_relatorio as $value) {
                $b .= $value['qnt'] . ',';
            }
            foreach ($relacao_relatorio as $value) {
                $c .= $value['KM'] . ',';
            }

            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $smarty->assign('verificador', $verificador);
            $smarty->assign('titulo1', 'Relatório de Utilizaçao de Motorista por Periodo de ' . $data_inicio . ' a ' . $data_fim);
            $smarty->assign('titulo', 'Relatório de Utilizaçao de Motorista por Periodo');
            $smarty->assign('relacao_relatorio', $relacao_relatorio);
            $smarty->assign('a', $a);
            $smarty->assign('b', $b);
            $smarty->assign('c', $c);
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header_datatables.tpl');
            $smarty->display($menu);
            $smarty->display('relatoriomotorista.tpl');
            $smarty->display('./footer/footer_relatorio_grafico.tpl');
        }
    }
}
?>