<?php

include '../include/config.inc.php';

session_start();

if (!isset($_SESSION['login']) && ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    session_unset();
    header('Location: ' . constant("HOST"));
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();
    
    $manutencao = new ManutencaoViatura();
    $relacao_manutencao = $manutencao->listarMntVtr();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Manutenção de Viaturas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_manutencao');
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_manutencao', $relacao_manutencao);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('manutencao_viatura.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT id_manutencao_viatura, id_viatura, odometro, descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data FROM manutencao_viaturas WHERE id_manutencao_viatura = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            if ($executa) {
                $dados_manutencao_viaturas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_manutencao_viatura = $dados_manutencao_viaturas->id_manutencao_viatura;
                $id_viatura = $dados_manutencao_viaturas->id_viatura;
                $odometro = $dados_manutencao_viaturas->odometro;
                $descricao = $dados_manutencao_viaturas->descricao;
                $data = $dados_manutencao_viaturas->data;
            } else {
                print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

         $smarty->assign('titulo', 'Atualização de Manutenção de Viaturas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_manutencao');
        $smarty->assign('id_manutencao_viatura', $id_manutencao_viatura);
        $smarty->assign('id_viatura', $id_viatura);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('data', $data);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_manutencao', $relacao_manutencao);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('manutencao_viatura.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    }
}
?>