<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $viatura = new Viatura();
    $relacao_viaturas = $viatura->quantidadeVtrMarcaModelo();
    $relacao_viaturas1 = $viatura->listarVtrIndisponiveis();
    $a = '';
    $b = '';
    $c = '';
    foreach ($relacao_viaturas as $value) {
        $i = 0;
        $a .= '"' . $value['marca'] . '-' . $value['modelo'] . '"' . ',';
        $b .= $value['qnt'] . ',';
        foreach ($relacao_viaturas1 as $value1) {
            if ($value['marca'] . " " . $value['modelo'] == $value1['marca'] . " " . $value1['modelo']) {
                $c .= $value1['qnt'] . ',';
            } else {
                $i = $i + 1;
            }
        }
        if ($i > (sizeof($relacao_viaturas1) - 1)) {
            $c .= 0 . ',';
        }
    }
    $smarty->assign('titulo', 'Gráfico Disponibilidade/Indisponibilidade Vtr');
    $smarty->assign('a', $a);
    $smarty->assign('b', $b);
    $smarty->assign('c', $c);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('relatoriodisponibilidadeviatura.tpl');
    $smarty->display('./footer/footer_relatorio_grafico.tpl');
}
?>