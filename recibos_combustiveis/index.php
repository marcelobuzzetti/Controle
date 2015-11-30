<?php
session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
require_once $_SERVER['DOCUMENT_ROOT'].'/Site/vendor/autoload.php';

    $combustiveis = new Combustivel();
    $relacao_combustiveis = $combustiveis->listarCombustiveis();

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipo_combustiveis = $tipos_combustiveis->listarTiposCombustiveis();

    $rcb_combustiveis = new RecebimentoCombustivel();
    $relacao_rcb_combustiveis = $rcb_combustiveis->listarRecebimentoCombustiveis();

    
    if(!isset($_POST['id'])){
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Recebimento de Combustíveis');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'rcb_comb');
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipo_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('relacao_rcb_combustiveis', $relacao_rcb_combustiveis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('../templates/headers/header.tpl');

        switch ($_SESSION['perfil']) {
            case 1:
                $smarty->display('../templates/menus/menuAdmin.tpl');
                break;
            case 2:
                $smarty->display('../templates/menus/menuOperador.tpl');
                break;
            case 3:
                $smarty->display('../templates/menus/menuMntGaragem.tpl');
                break;
            case 4:
                $smarty->display('../templates/menus/menuMntS4.tpl');
                break;
            default:
        }

        $smarty->display('../templates/recibos_combustiveis/index.tpl');

    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM recibos_combustiveis WHERE id_recibo_combustivel = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            
            if($executa){
                $dados_rcb_combustiveis = $stmt->fetch(PDO::FETCH_OBJ);
                $id_rcb_comb = $dados_rcb_combustiveis->id_recibo_combustivel;
                $qnt = $dados_rcb_combustiveis->qnt;
                $motivo = $dados_rcb_combustiveis->motivo;
            } else {
                      print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");                      
            }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Atualização de Recebimento de Combustíveis');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_rcb_comb');
        $smarty->assign('id_rcb_comb', $id_rcb_comb);
        $smarty->assign('qnt', $qnt);
        $smarty->assign('motivo', $motivo);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipo_combustiveis', $relacao_tipo_combustiveis);
        $smarty->assign('relacao_rcb_combustiveis', $relacao_rcb_combustiveis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('../templates/headers/header.tpl');

        switch ($_SESSION['perfil']) {
            case 1:
                $smarty->display('../templates/menus/menuAdmin.tpl');
                break;
            case 2:
                $smarty->display('../templates/menus/menuOperador.tpl');
                break;
            case 3:
                $smarty->display('../templates/menus/menuMntGaragem.tpl');
                break;
            case 4:
                $smarty->display('../templates/menus/menuMntS4.tpl');
                break;
            default:
        }

        $smarty->display('../templates/recibos_combustiveis/index.tpl');
    }
}