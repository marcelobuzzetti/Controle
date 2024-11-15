<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: /percurso');
} else {

    $marcas = new Marca();
    $relacao_marcas = $marcas->listarMarcas();

    $modelos = new Modelo();
    $tabela_modelos_cadastrados = $modelos->listarModelos();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Modelos');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_modelo');
        $smarty->assign('relacao_marcas', $relacao_marcas);
        $smarty->assign('tabela_modelos_cadastrados', $tabela_modelos_cadastrados);
        if (!empty($_SESSION['cadastrado'])) {
            $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        } else {
            $smarty->assign('cadastrado', FALSE);
        }
        if (!empty($_SESSION['atualizado'])) {
            $smarty->assign('atualizado', $_SESSION['atualizado']);
        } else {
            $smarty->assign('atualizado', FALSE);
        }
        if (!empty($_SESSION['apagado'])) {
            $smarty->assign('apagado', $_SESSION['apagado']);
        } else {
            $smarty->assign('apagado', FALSE);
        }
        $smarty->assign('marca', '');
        $smarty->assign('id_modelo', '');
        $smarty->assign('descricao', '');
        $smarty->assign('cap_tanque', '');
        $smarty->assign('consumo_padrao', '');
        $smarty->assign('cap_transp', '');
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('modelo.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {

        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM modelos WHERE id_modelo = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_modelos = $stmt->fetch(PDO::FETCH_OBJ);
                $id_modelo = $dados_modelos->id_modelo;
                $id_marca = $dados_modelos->id_marca;
                $descricao = $dados_modelos->descricao;
                $cap_tanque = $dados_modelos->cap_tanque;
                $consumo_padrao = $dados_modelos->consumo_padrao;
                $cap_transp = $dados_modelos->cap_transp;
                $descricao = $dados_modelos->descricao;
            } else {
                print("<script language=JavaScript>
                       alert('Não foi possível criar tabela.');
                       </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (!empty($_SESSION['cadastrado'])) {
            $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        } else {
            $smarty->assign('cadastrado', FALSE);
        }
        if (!empty($_SESSION['atualizado'])) {
            $smarty->assign('atualizado', $_SESSION['atualizado']);
        } else {
            $smarty->assign('atualizado', FALSE);
        }
        if (!empty($_SESSION['apagado'])) {
            $smarty->assign('apagado', $_SESSION['apagado']);
        } else {
            $smarty->assign('apagado', FALSE);
        }
        $smarty->assign('titulo', 'Atualização de Modelos');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_modelo');
        $smarty->assign('marca', $id_marca);
        $smarty->assign('id_modelo', $id_modelo);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('cap_tanque', $cap_tanque);
        $smarty->assign('consumo_padrao', $consumo_padrao);
        $smarty->assign('cap_transp', $cap_transp);
        $smarty->assign('relacao_marcas', $relacao_marcas);
        $smarty->assign('tabela_modelos_cadastrados', $tabela_modelos_cadastrados);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('modelo.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
