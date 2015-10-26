<?php

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ../percursos');
} else {
    require_once('../libs/smarty/Smarty.class.php');
    include '../configs/sessao.php';
    include '../configs/conexao.php';
    include '../class/relacao.php';
    
        if(!isset($_POST['id'])){
            
            $motoristas = new Motorista();
            $relacao_motoristas = $motoristas->listarMotoristas();
            
            $viaturas = new Viatura();
            $relacao_viaturas = $viaturas->listarViaturas();
            
            $combustiveis = new Combustiveis();
            $relacao_combustiveis = $combustiveis->listarCombustiveisAbastecimento();
            
            $tipos_combustiveis = new TiposCombustiveis();
            $relacao_tipo_combustiveis = $tipos_combustiveis->listarTiposCombustiveisAbastecimento();

           $abastecimentos = new Abastecimentos();
           $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();            

            $smarty = new Smarty();
            $smarty->assign('titulo', 'Cadastro de Abastecimentos');
            $smarty->assign('botao', 'Cadastrar');
            $smarty->assign('relacao_motoristas', $relacao_motoristas);
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

            $smarty->display('../templates/abastecimentos/index.tpl');

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

        $motoristas = new Motorista();
        $relacao_motoristas = $motoristas->listarMotoristas();
        
        $viaturas = new Viatura();
        $relacao_viaturas = $viaturas->listarViaturas();
        
        $combustiveis = new Combustiveis();
        $relacao_combustiveis = $combustiveis->listarCombustiveisAbastecimento();
            
        $tipos_combustiveis = new TiposCombustiveis();
        $relacao_tipo_combustiveis = $tipos_combustiveis->listarTiposCombustiveisAbastecimento();

        $abastecimentos = new Abastecimentos();
        $tabela_relacao_abastecimentos = $abastecimentos->listarAbastecimentos();            

        $smarty = new Smarty();
        $smarty->assign('titulo', 'Atualização de Abastecimentos');
        $smarty->assign('botao', 'Atualizar');
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

        $smarty->display('../templates/abastecimentos/index.tpl');
        }
        }
