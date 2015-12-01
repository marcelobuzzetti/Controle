<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Site/include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/Site'.'/percursos');
} else {
    
    $combustiveis = new Combustivel();
    $relacao_combustiveis = $combustiveis->listarCombustiveis();
    
    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
        
        if(!isset($_POST['id'])){
            
            $smarty->assign('titulo', 'Cadastro de Combustível');
            $smarty->assign('botao', 'Cadastrar');
            $smarty->assign('evento', 'combustivel');
            $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header.tpl');
            $smarty->display($menu);
            $smarty->display('.combustivel.tpl');

    } else {
                $id = $_POST['id'];
                try {
                    $stmt = $pdo->prepare("SELECT * FROM combustiveis WHERE id_combustivel = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                  if ($executa) {
                        $dados_combustiveis = $stmt->fetch(PDO::FETCH_OBJ);
                        $id_combustivel =  $dados_combustiveis->id_combustivel;
                        $descricao = $dados_combustiveis->descricao;

                  } else {
                      print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");

                  }

                  } catch (PDOException $e) {
                    echo $e->getMessage();

                  }
                  
            $smarty->assign('titulo', 'Atualização de Combustível');
            $smarty->assign('botao', 'Atualizar');
            $smarty->assign('evento', 'atualizar_combustivel');
            $smarty->assign('id_combustivel', $id_combustivel);
            $smarty->assign('descricao', $descricao);
            $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
            $smarty->assign('login', $_SESSION['login']);
            $smarty->display('./headers/header.tpl');
            $smarty->display($menu);
            $smarty->display('./combustivel.tpl');
            }
}