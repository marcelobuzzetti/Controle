<?php

session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)) {
    header('Location: ../percursos');
} else {
    require_once('../libs/smarty/Smarty.class.php');
    include_once("../configs/autoload.php");
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    include '../class/relacao.php';
    
    $usuarios =new Usuario();
    $relacao_usuarios = $usuarios->listarUsuario();
    
    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();
    
    if(!isset($_POST['id'])){
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Usuários');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_usuario');
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_perfis', $relacao_perfis);
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

        $smarty->display('../templates/usuarios/index.tpl');

    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            
            if($executa){
                $dados_usuarios = $stmt->fetch(PDO::FETCH_OBJ);
                $id_usuario = $dados_usuarios->id_usuario;
                $login1 = $dados_usuarios->login;
                $apelido = $dados_usuarios->nome;
                
            } else {
                      print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");                      
            }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Atualizar de Usuários');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_usuario');
        $smarty->assign('id_usuario', $id_usuario);
        $smarty->assign('login1', $login1);
        $smarty->assign('apelido', $apelido);
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_perfis', $relacao_perfis);
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

        $smarty->display('../templates/usuarios/index.tpl');
    }
}