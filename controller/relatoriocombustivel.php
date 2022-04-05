<?php

include '../include/config.inc.php';



if (isset($_SESSION['login']) == FALSE) {
    header('Location: /percurso');
} else {

    $verificador = 0;

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (isset($_POST['enviar']) && $_POST['enviar'] == "relatorio_completo") {

        $verificador = 1;

        $relatorios = new Relatorio();
        $relacao_relatorio = $relatorios->listarAbastecimentoCompleto();
        $a = '';
        $b = '';

        foreach ($relacao_relatorio as $value) {
            $a .= '"' . $value['combustivel'] . " " . $value['tipo'] . '"' . ',';
        }
        foreach ($relacao_relatorio as $value) {
            if ($value['qnt'] == 0) {
                $b .= '0' . ',';    
            } else {
            $b .= $value['qnt'] . ',';
            }
        }

        $smarty->assign('verificador', $verificador);
        $smarty->assign('titulo', 'Relatório Consumo de Combustível');
        $smarty->assign('titulo1', 'Relatório Consumo de Combustível Completo');
        $smarty->assign('relacao_relatorio', $relacao_relatorio);
        $smarty->assign('a', $a);
        $smarty->assign('b', $b);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('relatoriocombustivel.tpl');
        $smarty->display('./footer/footer_relatorio_grafico.tpl');
    } else {

        if (!isset($_POST['data_inicio'])) {

            $smarty->assign('verificador', $verificador);
            $smarty->assign('titulo', 'Relatório Consumo de Combustível');
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header_datatables.tpl');
            $smarty->display($menu);
            $smarty->display('relatoriocombustivel.tpl');
            $smarty->display('./footer/footer_relatorio_grafico.tpl');
        } else {

            $verificador = 2;
            $data_inicio = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_inicio'])));
            $data_fim = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_fim'])));

            $relatorios = new Relatorio();
            $relacao_relatorio = $relatorios->listarAbastecimento($data_inicio, $data_fim);

            $a = '';
            $b = '';

            foreach ($relacao_relatorio as $value) {
                $a .= '"' . $value['combustivel'] . " " . $value['tipo'] . '"' . ',';
            }
            foreach ($relacao_relatorio as $value) {
                $b .= $value['qnt'] . ',';
            }

            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $smarty->assign('verificador', $verificador);
            $smarty->assign('titulo', 'Relatório Consumo de Combustível');
            $smarty->assign('titulo1', 'Relatório Consumo de Combustível de ' . $data_inicio . ' a ' . $data_fim);
            $smarty->assign('relacao_relatorio', $relacao_relatorio);
            $smarty->assign('a', $a);
            $smarty->assign('b', $b);
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header_datatables.tpl');
            $smarty->display($menu);
            $smarty->display('relatoriocombustivel.tpl');
            $smarty->display('./footer/footer_relatorio_grafico.tpl');
        }
    }
}
?>