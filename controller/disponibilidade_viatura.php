<?php

include '../include/config.inc.php';



if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    session_unset();
    header('Location: /percurso');
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();

    $alteracao = new AlteracaoViatura();
    $relacao_alteracao = $alteracao->listarDisponibilidadeVtr();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastrar Indisponibilidade de Viaturas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_disponibilidade');
        $smarty->assign('id_alteracao_viatura', '');
        $smarty->assign('odometro', '');
        $smarty->assign('descricao', '');
        $smarty->assign('data', '');
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_alteracao', $relacao_alteracao);
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
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('disponibilidade_viatura.tpl');
        $smarty->display('./footer/footer_acidente.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT id_disponibilidade, indisponibilidade.id_viatura, 
            indisponibilidade.odometro AS odometro, indisponibilidade.motivo AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data,
            status.status
            FROM indisponibilidade, status
            WHERE indisponibilidade.id_status = status.id_status
            AND id_disponibilidade = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            if ($executa) {
                $dados_alteracao_viaturas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_disponibilidade = $dados_alteracao_viaturas->id_disponibilidade;
                $id_viatura = $dados_alteracao_viaturas->id_viatura;
                $odometro = $dados_alteracao_viaturas->odometro;
                $descricao = $dados_alteracao_viaturas->descricao;
                $data = $dados_alteracao_viaturas->data;
            } else {
                print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualização de Alteração de Viaturas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_disponibilidade');
        $smarty->assign('id_alteracao_viatura', $id_disponibilidade);
        $smarty->assign('id_viatura', $id_viatura);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('data', $data);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_alteracao', $relacao_alteracao);
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
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('disponibilidade_viatura.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    }
}
?>