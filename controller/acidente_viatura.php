<?php

include '../include/config.inc.php';

session_start();

if (isset($_SESSION['login']) == FALSE && ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 4)) {
    session_unset();
    header('Location: ' . constant("HOST"));
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->listarViaturas();

    $motorista = new Motorista();
    $relacao_motoristas = $motorista->listarMotoristasCadastrados();

    $acidente = new AcidenteViatura();
    $relacao_acidentes = $acidente->listarAcidenteVtr();

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    if (!isset($_POST['id'])) {

        $smarty->assign('titulo', 'Acidentes de Viaturas');
        $smarty->assign('botao', 'Cadastrar');
        $smarty->assign('evento', 'cadastrar_acidente');
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_motoristas', $relacao_motoristas);
        $smarty->assign('relacao_acidentes', $relacao_acidentes);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('acidente_viatura.tpl');
        $smarty->display('./footer/footer_acidente.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    } else {
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT id_acidente_viatura, acidentes_viaturas.id_motorista AS id_motorista, acidentes_viaturas.id_viatura AS id_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa, IFNULL(acompanhante,'Sem Acompanhante') AS acompanhante, motoristas.apelido AS motorista, acidentes_viaturas.odometro AS odometro, acidentes_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data, avarias, acidentes_viaturas.id_situacao
                                                    FROM viaturas, marcas, modelos, acidentes_viaturas, motoristas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND motoristas.id_motorista = acidentes_viaturas.id_motorista
                                                    AND acidentes_viaturas.id_viatura = viaturas.id_viatura
                                                    AND id_acidente_viatura = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            if ($executa) {
                $dados_acidente_viaturas = $stmt->fetch(PDO::FETCH_OBJ);
                $id_acidente_viatura = $dados_acidente_viaturas->id_acidente_viatura;
                $id_viatura = $dados_acidente_viaturas->id_viatura;
                $id_motorista = $dados_acidente_viaturas->id_motorista;
                $acompanhante = $dados_acidente_viaturas->acompanhante;
                $odometro = $dados_acidente_viaturas->odometro;
                $descricao = $dados_acidente_viaturas->descricao;
                $avarias = $dados_acidente_viaturas->avarias;
                $data = $dados_acidente_viaturas->data;
                $id_situacao = $dados_acidente_viaturas->id_situacao;

                if ($id_situacao == 2) {
                    $disponibilidade = "checked";
                }
            } else {
                print("<script language=JavaScript>
                               alert('Não foi possível criar tabela.');
                               </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $smarty->assign('titulo', 'Atualização de Acidente de Viaturas');
        $smarty->assign('botao', 'Atualizar');
        $smarty->assign('evento', 'atualizar_acidente');
        $smarty->assign('id_acidente_viatura', $id_acidente_viatura);
        $smarty->assign('id_viatura', $id_viatura);
        $smarty->assign('id_motorista', $id_motorista);
        $smarty->assign('acompanhante', $acompanhante);
        $smarty->assign('odometro', $odometro);
        $smarty->assign('descricao', $descricao);
        $smarty->assign('avarias', $avarias);
        $smarty->assign('data', $data);
        $smarty->assign('disponibilidade', $disponibilidade);
        $smarty->assign('relacao_viaturas', $relacao_viaturas);
        $smarty->assign('relacao_motoristas', $relacao_motoristas);
        $smarty->assign('relacao_acidentes', $relacao_acidentes);
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
        $smarty->assign('atualizado', $_SESSION['atualizado']);
        $smarty->assign('apagado', $_SESSION['apagado']);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header_datatables.tpl');
        $smarty->display($menu);
        $smarty->display('acidente_viatura.tpl');
        $smarty->display('./footer/footer_acidente.tpl');
        unset($_SESSION['cadastrado']);
        unset($_SESSION['atualizado']);
        unset($_SESSION['apagado']);
    }
}
?>