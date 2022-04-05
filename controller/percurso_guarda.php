<?php

include '../include/config.inc.php';


/* if(!empty($_SESSION['POST'])) {
    $_POST = unserialize($_SESSION['POST']);
}
unset($_SESSION['POST']); */
/* if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 2)) {
    session_unset();
    header('Location: ' . constant("HOST"));
} else { */

    $viaturas = new Viatura();
    $tabela_relacao_viaturas = $viaturas->listarViaturasPercursos();

    $percursos = new Percurso();
    $tabela_relacao_viaturas_fechadas = $percursos->listarPercursosFechadas();

    $motoristas = new Motorista();
    $relacao_motoristas = $motoristas->listarMotoristas();

    $relacao_viaturas = $viaturas->listarViaturasPercursosDisponiveis();

    $menus = new Menu();
    if(isset($_SESSION['perfil'])){
        $menu = $menus->SelecionarMenu($_SESSION['perfil']);
    }else{
        $menu = $menus->SelecionarMenu(10);
    }

    /* $smarty->assign('HOST', constant("HOST")); */
    if (!empty($contador)) {$smarty->assign('contador', $contador);}
    $smarty->assign('tabela_relacao_vtr', $tabela_relacao_viaturas);
    $smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_viaturas_fechadas);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    if (!empty($_SESSION['cadastrado'])) {
        $smarty->assign('cadastrado', $_SESSION['cadastrado']);
    } else {
        $smarty->assign('cadastrado', FALSE);
    }
    if (!empty($_SESSION['atualizado'])) {
        $smarty->assign('atualizado', $_SESSION['atualizado']);
    } else {
        $smarty->assign('atualizado', FALSE);
    }
    if (!empty($_SESSION['apagado'])) {
        $smarty->assign('apagado', $_SESSION['apagado']);
    } else {
        $smarty->assign('apagado', FALSE);
    }
    if (!empty($_SESSION['erro2'])) {
        $smarty->assign('erro2', $_SESSION['erro2']);
    } else {
        $smarty->assign('erro2', FALSE);
    }
    if (!empty($_SESSION['erro1'])) {
        $smarty->assign('erro1', $_SESSION['erro1']);
    } else {
        $smarty->assign('erro1', FALSE);
    }
    if (!empty($_SESSION['erro3'])) {
        $smarty->assign('erro3', $_SESSION['erro3']);
    } else {
        $smarty->assign('erro3', FALSE);
    }
    if (!empty($_SESSION['POST'])) {
        $smarty->assign('dados', "Preencha todos os campos");
        unset($_SESSION['POST']);
    } else {
        $smarty->assign('dados', FALSE);
    }
    
    if(isset($_SESSION['login'])){
    $smarty->assign('login', $_SESSION['login']);
    }

    if(!empty($_SESSION['key'])){
        $smarty->assign('token', $_SESSION['key']);
    } else {
        $_SESSION['key'] = md5(uniqid(rand(), TRUE));
        $smarty->assign('token', $_SESSION['key']);
    }
    $smarty->assign('token', $_SESSION['key']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('percurso_guarda.tpl');
    $smarty->display('./footer/footer_percursos.tpl');
    unset($_SESSION['cadastrado']);
    unset($_SESSION['atualizado']);
    unset($_SESSION['apagado']);
    unset($_SESSION['erro3']);
    unset($_SESSION['erro2']);
    unset($_SESSION['erro1']);
/* } */
?>