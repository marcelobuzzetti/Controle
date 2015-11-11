<?php
session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
    require_once('../libs/smarty/Smarty.class.php');
    include_once("../configs/autoload.php");
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    include '../class/relacao.php';

    $tipos_combustiveis = new TipoCombustivel();
    $relacao_tipos_combustiveis = $tipos_combustiveis-> listarTiposCombustiveis();
    
    if(!isset($_POST['id'])){
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Tipo de Combustíveis');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'tipo');
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipos_combustiveis);
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

        $smarty->display('../templates/tipos_combustiveis/index.tpl');

    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM tipos_combustiveis WHERE id_tipo_combustivel = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            
            if($executa){
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
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Atualização de Tipo de Combustíveis');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_tipo');
        $smarty->assign('id_tipo_combustivel', $id_tipo_combustivel);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('relacao_tipos_combustiveis', $relacao_tipos_combustiveis);
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

        $smarty->display('../templates/tipos_combustiveis/index.tpl');
    }
}