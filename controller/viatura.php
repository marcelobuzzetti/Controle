<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5)) {
    header('Location: /percurso');
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

        $smarty->assign('id_viatura', '');
        $smarty->assign('marca', '');
        $smarty->assign('modelo', '');
        $smarty->assign('habilitacao', '');
        $smarty->assign('ano', '');
        $smarty->assign('tipo_vtr', '');
        $smarty->assign('combustivel', '');
        $smarty->assign('situacao', '');
        $smarty->assign('placa', '');
        $smarty->assign('odometro', '');
        $smarty->assign('rfid', '');
        $smarty->assign('update', '');
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
            $stmt = $pdo->prepare("SELECT v.id_viatura, v.id_marca, v.rfid, v.id_modelo, placa, 
            IFNULL( GREATEST( MAX( p.odo_retorno ) , 
            MAX( p.odo_saida ) ) , v.odometro ) AS odometro, v.id_habilitacao, v.id_tipo_viatura, v.id_combustivel, 
            v.ano, v.id_situacao
            FROM percursos p
            RIGHT JOIN viaturas v ON p.id_viatura = v.id_viatura
            INNER JOIN marcas m ON m.id_marca = v.id_marca
            INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
            INNER JOIN habilitacoes ha ON ha.id_habilitacao = v.id_habilitacao
            INNER JOIN situacao s ON s.id_situacao = v.id_situacao AND v.id_viatura = $id
            GROUP BY v.id_viatura
            ORDER BY v.id_viatura");
            $executa = $stmt->execute();

            if ($executa) {
                $dados_viaturas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_viatura = $dados_viaturas->id_viatura;
                $marca = $dados_viaturas->id_marca;
                $modelo = $dados_viaturas->id_modelo;
                $placa = $dados_viaturas->placa;
                $rfid = $dados_viaturas->rfid;
                $habiltacao = $dados_viaturas->id_habilitacao;
                $tipo_vtr = $dados_viaturas->id_tipo_viatura;
                $combustivel = $dados_viaturas->id_combustivel;
                $odometro = $dados_viaturas->odometro;
                $ano = $dados_viaturas->ano;
                $situacao = $dados_viaturas->id_situacao;
                /*$motivo = $dados_viaturas->motivo;
                $data = $dados_viaturas->data;
                $odo_ind = $dados_viaturas->odo_ind;
                $id_status = $dados_viaturas->id_status;*/
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
        $smarty->assign('ano', $ano);
        $smarty->assign('tipo_vtr', $tipo_vtr);
        $smarty->assign('combustivel', $combustivel);
        $smarty->assign('situacao', $situacao);
        $smarty->assign('placa', $placa);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('rfid', $rfid);
        /*$smarty->assign('motivo', $motivo);
        $smarty->assign('data', $data);
        $smarty->assign('odo_ind', $odo_ind);
        $smarty->assign('id_status', $id_status);*/
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