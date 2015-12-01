<?php
include $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/include/config.inc.php';

session_start();

if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1)) {
   header('Location: '.  constant("HOST").'/controller/percurso.php');
} else {
        
    $usuarios =new Usuario();
    $relacao_usuarios = $usuarios->listarUsuario();
    
    $perfis = new Perfil();
    $relacao_perfis = $perfis->listarPerfil();
    
    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
    
    if(!isset($_POST['id'])){
        
        $smarty->assign('titulo', 'Cadastro de Usuários');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_usuario');
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('usuario.tpl');

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
            
        $smarty->assign('titulo', 'Atualizar de Usuários');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_usuario');
        $smarty->assign('id_usuario', $id_usuario);
        $smarty->assign('login1', $login1);
        $smarty->assign('apelido', $apelido);
        $smarty->assign('relacao_usuarios', $relacao_usuarios);
        $smarty->assign('relacao_perfis', $relacao_perfis);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('usuario.tpl');
    }
}