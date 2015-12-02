<?php
include $_SERVER['DOCUMENT_ROOT'].'/include/config.inc.php';

session_start();

if (!isset($_SESSION['login'])) {
    session_unset();
    header('Location: '.  constant("HOST"));
} else {
    
    $viaturas = new Viatura();
    $tabela_relacao_viaturas = $viaturas->listarViaturasPercursos();

    $percursos = new Percurso();
    $tabela_relacao_viaturas_fechadas = $percursos->listarPercursosFechadas();

    $motoristas = new Motorista();
    $relacao_motoristas = $motoristas->listarMotoristas();

    $relacao_viaturas = $viaturas->listarViaturasPercursosDisponiveis();
    
    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
    
    $smarty->assign('contador', $contador);
    $smarty->assign('tabela_relacao_vtr', $tabela_relacao_viaturas);
    $smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_viaturas_fechadas);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/headerPercursos.tpl');
    $smarty->display($menu);
    $smarty->display('percurso.tpl');
}
?>