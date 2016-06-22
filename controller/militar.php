<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] == 2)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $postograd = new PostoGrad();
    $relacao_posto_grad = $postograd->listarPostoGrad();

    $habiltacoes = new Habilitacao();
    $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();

    $militares = new Militar();
    $militares_cadastrados = $militares->listarMilitar();

    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Militares');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_militar');
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('erro', $_SESSION['erro']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('militar.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
        unset($_SESSION['erro']);
    } else {

        $id = $_POST['id'];
        $update = 1;

        $militar_atualizar = $militares->listarMilitarAtualizar($id);
        $militar_atualizar_telefone = $militares->listarTelefoneMilitarAtualizar($id);
        
        if(empty($militar_atualizar_telefone) ){
            $telefones = 0;
        } else {
            $telefones = 1;
        }
        
        
        $smarty->assign('titulo', 'Atualizar Militares');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_militar');
        $smarty->assign('update', $update);
        $smarty->assign('telefones', $telefones);
        $smarty->assign('id_militar', $militar_atualizar[0]['id_militar']);
        $smarty->assign('numero_militar', $militar_atualizar[0]['numero_militar']);
        $smarty->assign('cp', $militar_atualizar[0]['cp']);
        $smarty->assign('grupo', $militar_atualizar[0]['grupo']);
        $smarty->assign('antiguidade', $militar_atualizar[0]['antiguidade']);
        $smarty->assign('data_praca', $militar_atualizar[0]['data_praca']);
        $smarty->assign('id_pg', $militar_atualizar[0]['id_posto_grad']);
        $smarty->assign('nome_completo', $militar_atualizar[0]['nome_completo']);
        $smarty->assign('nome', $militar_atualizar[0]['nome']);
        $smarty->assign('data_nascimento', $militar_atualizar[0]['data_nascimento']);
        $smarty->assign('estado_nascimento', $militar_atualizar[0]['estado_nascimento']);
        $smarty->assign('cidade_nascimento', $militar_atualizar[0]['cidade_nascimento']);
        $smarty->assign('idt_militar', $militar_atualizar[0]['idt_militar']);
        $smarty->assign('rg', $militar_atualizar[0]['rg']);
        $smarty->assign('orgao_expedidor', $militar_atualizar[0]['orgao_expedidor']);
        $smarty->assign('cpf', $militar_atualizar[0]['cpf']);
        $smarty->assign('pai', $militar_atualizar[0]['pai']);
        $smarty->assign('mae', $militar_atualizar[0]['mae']);
        $smarty->assign('conjuge', $militar_atualizar[0]['conjuge']);
        $smarty->assign('data_nascimento_conjuge', $militar_atualizar[0]['data_nascimento_conjuge']);
        $smarty->assign('militar_atualizar_telefone', $militar_atualizar_telefone);
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('erro', $_SESSION['erro']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('militar.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
        unset($_SESSION['erro']);
    }
}
