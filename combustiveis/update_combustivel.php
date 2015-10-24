<?php 

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
require_once('../libs/smarty/Smarty.class.php');
include '../configs/sessao.php';
include '../configs/conexao.php';

if(!isset($_POST['id'])){
     header('Location: index.php');
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
  
try {
    $stmt = $pdo->prepare("SELECT * FROM combustiveis;");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_combustiveis= $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


$smarty = new Smarty();
$smarty->assign('id_combustivel', $id_combustivel);
$smarty->assign('descricao', $descricao);
$smarty->assign('relacao_combustiveis', $relacao_combustiveis);
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

$smarty->display('../templates/combustiveis/update_combustiveis.tpl');
}
}
