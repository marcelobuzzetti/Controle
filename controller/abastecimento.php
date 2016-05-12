<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $motoristas = new Motorista();
    $relacao_motoristas = $motoristas->listarMotoristasCompleto();

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();

    $combustiveis = new Combustivel();
    $relacao_combustiveis = $combustiveis->listarCombustiveisAbastecimento();

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipo_combustiveis = $tipos_combustiveis->listarTiposCombustiveisAbastecimento();

    $abastecimentos = new Abastecimento();
    $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);


    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Abastecimentos');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'abst');
        $smarty->assign('relacao_motoristas', $relacao_motoristas);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_abastecimento.tpl');
        $smarty->display($menu);
        $smarty->display('abastecimento.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {

        $id = $_POST['id'];
        $update = 1;

        try {
            $stmt = $pdo->prepare("SELECT * FROM abastecimentos WHERE id_abastecimento = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_abastecimentos = $stmt->fetch(PDO::FETCH_OBJ);
                $id_abastecimento = $dados_abastecimentos->id_abastecimento;
                $nrvale = $dados_abastecimentos->nrvale;
                $motorista = $dados_abastecimentos->id_motorista;
                $viatura = $dados_abastecimentos->id_viatura;
                $odometro = $dados_abastecimentos->odometro;
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
        $smarty->assign('evento', 'atualizar_abst');
        $smarty->assign('update', $update);
        $smarty->assign('id_abastecimento', $id_abastecimento);
        $smarty->assign('nrvale', $nrvale);
        $smarty->assign('motorista', $motorista);
        $smarty->assign('viatura', $viatura);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('combustivel', $combustivel);
        $smarty->assign('tipo_combustivel', $tipo_combustivel);
        $smarty->assign('qnt', $qnt);
        $smarty->assign('relacao_motoristas', $relacao_motoristas);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_abastecimento.tpl');
        $smarty->display($menu);
        $smarty->display('abastecimento.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
