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
        
        $postograd = new PostoGrad();
        $relacao_posto_grad = $postograd->listarPostoGrad();
        
        $habiltacoes = new Habilitacao();
        $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();
        
        $motoristas = new Motorista();
        $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'motorista');
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
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

        $smarty->display('../templates/motoristas/index.tpl');

    } else {
        
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas WHERE id_motorista = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_motoristas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_motorista = $dados_motoristas->id_motorista;
                $nome = $dados_motoristas->nome;

            } else {
            print("<script language=JavaScript>
                   alert('Não foi possível criar tabela.');
                   </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $postograd = new PostoGrad();
        $relacao_posto_grad = $postograd->listarPostoGrad();
        
        $habiltacoes = new Habilitacao();
        $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();
        
        $motoristas = new Motorista();
        $tabela_motoristas_cadastrados = $motoristas->listarMotoristasCadastrados();
        
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Cadastro de Motoristas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_motorista');
        $smarty->assign('id_motorista', $id_motorista);
        $smarty->assign('nome', $nome);
        $smarty->assign('relacao_posto_grad', $relacao_posto_grad);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('tabela_motoristas_cadastrados', $tabela_motoristas_cadastrados);
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

        $smarty->display('../templates/motoristas/index.tpl');
        
    }
       
}
