<?php

include '../include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 5)) {
    header('Location: /percurso');
} else {

    $postograd = new PostoGrad();
    $relacao_posto_grad = $postograd->listarPostoGrad();

    $habiltacoes = new Habilitacao();
    $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();

    $militares = new Militar();
    $militares_cadastrados = $militares->listarMilitar();

    $estados = new EstadoCidade();
    $relacao_estados = $estados->listarEstado();

    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('update', '');
        $smarty->assign('id_militar', '');
        $smarty->assign('id_pg', '');
        $smarty->assign('nome_completo', '');
        $smarty->assign('nome', '');
        $smarty->assign('data_nascimento', '');
        $smarty->assign('estado_nascimento', '');
        $smarty->assign('cidade_nascimento', '');
        $smarty->assign('idt_militar', '');
        $smarty->assign('cpf', '');
        $smarty->assign('titulo', 'Cadastro de Militares');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_militar');
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('relacao_estados', $relacao_estados);
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('militar.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    } else {

        $id = $_POST['id'];
        $update = 1;

        $militar_atualizar = $militares->listarMilitarAtualizar($id);

        $cidades = new EstadoCidade();
        $relacao_cidades = $cidades->listarCidades();

        

        $smarty->assign('titulo', 'Atualizar Militares');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_militar');
        $smarty->assign('update', $update);
        $smarty->assign('id_militar', $militar_atualizar[0]['id_militar']);
        $smarty->assign('id_pg', $militar_atualizar[0]['id_posto_grad']);
        $smarty->assign('nome_completo', $militar_atualizar[0]['nome_completo']);
        $smarty->assign('nome', $militar_atualizar[0]['nome']);
        $smarty->assign('data_nascimento', $militar_atualizar[0]['data_nascimento']);
        $smarty->assign('estado_nascimento', $militar_atualizar[0]['id_estado']);
        $smarty->assign('cidade_nascimento', $militar_atualizar[0]['id_cidade']);
        $smarty->assign('idt_militar', $militar_atualizar[0]['idt_militar']);
        $smarty->assign('cpf', $militar_atualizar[0]['cpf']);
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
        $smarty->assign('relacao_cidades', $relacao_cidades);
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_estados', $relacao_estados);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('militar.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
