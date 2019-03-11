<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $postograd = new PostoGrad();
    $relacao_posto_grad = $postograd->listarPostoGrad();

    $habiltacoes = new Habilitacao();
    $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();

    $militar = new Militar();
    $relacao_militares = $militar->listarMilitarMotorista();

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('cnh', '');
        $smarty->assign('validade', '');
        $smarty->assign('id_motorista', '');
        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'motorista');
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_militares', $relacao_militares);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('motorista.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    } else {

        $id = $_POST['id'];
        $update = "disabled";

        $militar = new Militar();
        $relacao_militares = $militar->listarMilitar();

        $motoristas = new Motorista();
        $motoristas_atualizar = $motoristas->listarMotoristasAtualizar($id);

        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_motorista');
        $smarty->assign('update', $update);
        $smarty->assign('id_motorista', $motoristas_atualizar[0]['id_motorista']);
        $smarty->assign('id_militar', $motoristas_atualizar[0]['id_militar']);
        $smarty->assign('id_habilitacao', $motoristas_atualizar[0]['id_habilitacao']);
        $smarty->assign('cnh', $motoristas_atualizar[0]['cnh']);
        $smarty->assign('validade', $motoristas_atualizar[0]['validade']);
        $smarty->assign('relacao_militares', $relacao_militares);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('motorista.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
