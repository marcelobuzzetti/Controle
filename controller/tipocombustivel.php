<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';



if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 4)) {
    header('Location: /percurso');
} else {

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipos_combustiveis = $tipos_combustiveis->listarTiposCombustiveis();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('id_tipo_combustivel', '');
        $smarty->assign('descricao', '');       
        $smarty->assign('titulo', 'Cadastro de Tipo de Combustíveis');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'tipo');
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipos_combustiveis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('tipocombustivel.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM tipos_combustiveis WHERE id_tipo_combustivel = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_tipos_combustiveis = $stmt->fetch(PDO::FETCH_OBJ);
                $id_tipo_combustivel = $dados_tipos_combustiveis->id_tipo_combustivel;
                $descricao = $dados_tipos_combustiveis->descricao;
            } else {
                print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualização de Tipo de Combustíveis');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_tipo');
        $smarty->assign('id_tipo_combustivel', $id_tipo_combustivel);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipos_combustiveis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('tipocombustivel.tpl');
        $smarty->display('./footer/footer_combustivel.tpl');
    }
}