<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $postograd = new PostoGrad();
    $relacao_posto_grad = $postograd->listarPostoGrad();

    $habiltacoes = new Habilitacao();
    $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();

    $motoristas = new Motorista();
    $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'motorista');
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('motorista.tpl');
        $smarty->display('./footer/footer.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {

        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas WHERE id_motorista = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_motoristas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_motorista = $dados_motoristas->id_motorista;
                $pg = $dados_motoristas->id_posto_grad;
                $categoria = $dados_motoristas->id_habilitacao;
                $nome = $dados_motoristas->nome;
                $nome_completo = $dados_motoristas->nome_completo;
                $orgao_expedidor = $dados_motoristas->orgao_expedidor;
                $data_nascimento = date('d-m-Y',strtotime(str_replace('-', '/', $dados_motoristas->data_nascimento)));
                $rg = $dados_motoristas->rg;
                $cpf = $dados_motoristas->cpf;
                $cnh = $dados_motoristas->cnh;
                $validade = date('d-m-Y',strtotime(str_replace('-', '/', $dados_motoristas->validade)));
                
            } else {
                print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_motorista');
        $smarty->assign('id_motorista', $id_motorista);
        $smarty->assign('id_pg', $pg);
        $smarty->assign('categoria', $categoria);
        $smarty->assign('nome', $nome);
        $smarty->assign('nome_completo', $nome_completo);
        $smarty->assign('data_nascimento', $data_nascimento);
        $smarty->assign('rg', $rg);
        $smarty->assign('orgao_expedidor', $orgao_expedidor);
        $smarty->assign('cpf', $cpf);
        $smarty->assign('cnh', $cnh);
        $smarty->assign('validade', $validade);
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('motorista.tpl');
        $smarty->display('./footer/footer.tpl');
    }
}
