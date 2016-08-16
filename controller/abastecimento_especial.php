<?php

include '../include/config.inc.php';

session_start();
if (isset($_SESSION['login']) == FALSE  || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $combustiveis = new Combustivel();
    $relacao_combustiveis = $combustiveis->listarCombustiveisAbastecimento();

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipo_combustiveis = $tipos_combustiveis->listarTiposCombustiveisAbastecimento();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Abastecimentos Especiais');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'abst_especial');
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('abastecimento_especial.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {

        $id = $_POST['id'];
        $update = 1;

        try {
            $stmt = $pdo->prepare("SELECT * FROM abastecimentos_especiais WHERE id_abastecimento_especial = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_abastecimentos = $stmt->fetch(PDO::FETCH_OBJ);
                $id_abastecimento = $dados_abastecimentos->id_abastecimento_especial;
                $descricao = $dados_abastecimentos->descricao;
                $combustivel = $dados_abastecimentos->id_combustivel;
                $tipo_combustivel = $dados_abastecimentos->id_tipo_combustivel;
                $qnt = $dados_abastecimentos->qnt;
            } else {
                print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualização de Abastecimentos');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_abst_especial');
        $smarty->assign('update', $update);
        $smarty->assign('id_abastecimento', $id_abastecimento);
        $smarty->assign('nrvale', $descricao);
        $smarty->assign('combustivel', $combustivel);
        $smarty->assign('tipo_combustivel', $tipo_combustivel);
        $smarty->assign('qnt', $qnt);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('abastecimento_especial.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
