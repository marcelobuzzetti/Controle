<?php

include '../include/config.inc.php';

session_start();
if (!isset($_SESSION['login']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3)) {
    header('Location: ' . constant("HOST") . '/percurso');
} else {

    $marcas = new Marca();
    $relacao_marcas = $marcas->listarMarcas();

    $modelos = new Modelo();
    $relacao_modelos = $modelos->listarModelos();

    $situacao = new Situacao();
    $relacao_situacao = $situacao->listarSituacao();

    $habiltacoes = new Habilitacao();
    $relacao_habilitacoes = $habiltacoes->listarHabilitacoes();

    $combustivel = new Combustivel();
    $relacao_combustiveis = $combustivel->listarCombustiveis();

    $tipos_viaturas = new TipoViatura();
    $relacao_tipos_viaturas = $tipos_viaturas->listarTiposViaturas();

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturasCadastradas();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Cadastro de Viaturas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'viatura');
        $smarty->assign('relacao_marcas', $relacao_marcas);
        $smarty->assign('relacao_situacao', $relacao_situacao);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_viaturas', $relacao_tipos_viaturas);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('viatura.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    } else {

        $id = $_POST['id'];
        $update = 1;

        try {
            $stmt = $pdo->prepare("SELECT * FROM viaturas WHERE id_viatura = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $dados_viaturas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_viatura = $dados_viaturas->id_viatura;
                $marca = $dados_viaturas->id_marca;
                $modelo = $dados_viaturas->id_modelo;
                $placa = $dados_viaturas->placa;
                $habiltacao = $dados_viaturas->id_habilitacao;
                $tipo_vtr = $dados_viaturas->id_tipo_viatura;
                $combustivel = $dados_viaturas->id_combustivel;
                $odometro = $dados_viaturas->odometro;
                $situacao = $dados_viaturas->id_situacao;
            } else {
                print("<script language=JavaScript>
                       alert('Não foi possível criar tabela.');
                       </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualização de Viaturas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_viatura');
        $smarty->assign('update', $update);
        $smarty->assign('id_viatura', $id_viatura);
        $smarty->assign('marca', $marca);
        $smarty->assign('modelo', $modelo);
        $smarty->assign('habilitacao', $habiltacao);
        $smarty->assign('tipo_vtr', $tipo_vtr);
        $smarty->assign('combustivel', $combustivel);
        $smarty->assign('situacao', $situacao);
        $smarty->assign('placa', $placa);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('relacao_marcas', $relacao_marcas);
        $smarty->assign('relacao_modelos', $relacao_modelos);
        $smarty->assign('relacao_situacao', $relacao_situacao);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_habilitacoes', $relacao_habilitacoes);
        $smarty->assign('relacao_combustiveis', $relacao_combustiveis);
        $smarty->assign('relacao_tipos_viaturas', $relacao_tipos_viaturas);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('viatura.tpl');
        $smarty->display('./footer/footer_datatables.tpl');
    }
}
?>