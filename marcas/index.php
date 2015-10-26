<?php
session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
    require_once('../libs/smarty/Smarty.class.php');
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    if(!isset($_POST['id'])){
        try{
        $stmt = $pdo->prepare("SELECT * FROM marcas;");
        $executa = $stmt->execute();

        if ($executa) {
        $relacao_marcas= $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Marcas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('relacao_marcas', $relacao_marcas);
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

        $smarty->display('../templates/marcas/index.tpl');

} else {

        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM marcas WHERE id_marca = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_marcas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_marca = $dados_marcas->id_marca;
                $descricao = $dados_marcas->descricao;

            } else {
            print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try{
            $stmt = $pdo->prepare("SELECT * FROM marcas;");
            $executa = $stmt->execute();

            if ($executa) {
            $relacao_marcas= $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                       alert('Não foi possível criar tabela.');
                       </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty = new Smarty();
        $smarty->assign('titulo', 'Atualização de Marcas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('id_marca', $id_marca);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('relacao_marcas', $relacao_marcas);
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

        $smarty->display('../templates/marcas/index.tpl');
        
        }
        
        }
        