<?php

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
require_once('../lib/smarty/Smarty.class.php');
include "verificarLogin.php";
include '../sessao.php';
include '../configs/conexao.php';

if(!isset($_POST['id'])){
     header('Location: index.php');
} else {

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM abastecimentos WHERE id_abastecimento = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $executa = $stmt->execute();
    
    if ($executa) {
        $dados_abastecimentos = $stmt->fetch(PDO::FETCH_OBJ);
        $id_abastecimento = $dados_abastecimentos->id_abastecimento;
        $qnt = $dados_abastecimentos->qnt;
        
    } else {
    print("<script language=JavaScript>
           alert('Não foi possível criar tabela.');
           </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT id_motorista, apelido
                                        FROM motoristas");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_motoristas= $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                        FROM viaturas, marcas, modelos
                                        WHERE viaturas.id_marca = marcas.id_marca AND
                                        viaturas.id_modelo = modelos.id_modelo");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_viaturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT combustiveis.id_combustivel AS id_comb, descricao
                                        FROM combustiveis, recibos_combustiveis
                                        WHERE combustiveis.id_combustivel IN (SELECT recibos_combustiveis.id_combustivel
                                                                                                      FROM recibos_combustiveis)");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_combustiveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT tipos_combustiveis.id_tipo_combustivel AS id_tipo, descricao 
                                        FROM tipos_combustiveis, recibos_combustiveis
                                        WHERE tipos_combustiveis.id_tipo_combustivel IN (SELECT recibos_combustiveis.id_tipo_combustivel            
                                                                                                                      FROM recibos_combustiveis)");
    $executa = $stmt->execute();

    if ($executa) {
        $relacao_tipos_combustiveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT id_abastecimento, nrvale,  motoristas.apelido AS apelido, marcas.descricao AS marca, modelos.descricao AS modelo, viaturas.placa AS placa, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, data
                                        FROM abastecimentos, marcas, modelos, viaturas, motoristas, combustiveis, tipos_combustiveis
                                        WHERE abastecimentos.id_motorista = motoristas.id_motorista
                                        AND abastecimentos.id_viatura = viaturas.id_viatura
                                        AND abastecimentos.id_combustivel = combustiveis.id_combustivel
                                        AND abastecimentos.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                        AND viaturas.id_modelo = modelos.id_modelo
                                        AND viaturas.id_marca = marcas.id_marca;");
    $executa = $stmt->execute();

    if ($executa) {
        $tabela_relacao_abastecimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$smarty = new Smarty();
$smarty->assign('id_abastecimento', $id_abastecimento);
$smarty->assign('qnt', $qnt);
$smarty->assign('relacao_motoristas', $relacao_motoristas );
$smarty->assign('relacao_viaturas', $relacao_viaturas );
$smarty->assign('relacao_combustiveis', $relacao_combustiveis);
$smarty->assign('relacao_tipos_combustiveis', $relacao_tipo_combustiveis);
$smarty->assign('tabela_relacao_abastecimentos', $tabela_relacao_abastecimentos);
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

$smarty->display('../templates/abastecimentos/update_abastecimentos.tpl');
}
}
?>