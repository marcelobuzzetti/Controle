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

        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, id_posto_grad, militares.nome AS nome, nome_completo, DATE_FORMAT(data_nascimento,'%d/%m/%Y') AS data_nascimento, 
                                                rg, orgao_expedidor, cpf, cnh, id_habilitacao, DATE_FORMAT(validade, '%d/%m/%Y') AS validade, id_perfil, login, usuarios.nome AS usuario, senha
                                                FROM militares, motoristas, usuarios 
                                                WHERE militares.id_militar = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_militares = $stmt->fetch(PDO::FETCH_OBJ);
                $id_militar = $dados_militares->id_militar;
                $pg = $dados_militares->id_posto_grad;
                $nome = $dados_militares->nome;
                $nome_completo = $dados_militares->nome_completo;
                $data_nascimento = $dados_militares->data_nascimento;
                $rg = $dados_militares->rg;
                $orgao_expedidor = $dados_militares->orgao_expedidor;
                $cpf = $dados_militares->cpf;
                
            } else {
                print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualizar Militares');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_militar');
        $smarty->assign('id_militar', $id_militar);
        $smarty->assign('id_pg', $pg);
        $smarty->assign('categoria', $categoria);
        $smarty->assign('nome', $nome);
        $smarty->assign('nome_completo', $nome_completo);
        $smarty->assign('data_nascimento', $data_nascimento);
        $smarty->assign('rg', $rg);
        $smarty->assign('orgao_expedidor', $orgao_expedidor);
        $smarty->assign('cpf', $cpf);
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('militares_cadastrados', $militares_cadastrados);
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
