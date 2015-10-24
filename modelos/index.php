<?php 

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {

require_once('../libs/smarty/Smarty.class.php');
include '../configs/sessao.php';
include '../configs/conexao.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM marcas");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT * FROM habilitacoes");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_habilitacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT id_modelo, marcas.descricao AS marca, modelos.descricao AS descricao, cap_tanque, consumo_padrao, cap_transp, habilitacoes.categoria AS habilitacao
                                       FROM modelos, habilitacoes, marcas
                                       WHERE modelos.id_habilitacao = habilitacoes.id_habilitacao
                                       AND modelos.id_marca = marcas.id_marca;");
    $executa = $stmt->execute();

    if ($executa) {
        $tabela_modelos_cadastrados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$smarty = new Smarty();
$smarty->assign('relacao_marcas', $relacao_marcas);
$smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
$smarty->assign('tabela_modelos_cadastrados', $tabela_modelos_cadastrados);
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

$smarty->display('../templates/modelos/index.tpl');
}
?>