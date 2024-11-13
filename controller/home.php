<?php

include __DIR__ . '/include/config.inc.php';

/* $_SESSION['key'] = md5(uniqid(rand(), TRUE)); */
$erro = null;
$login = new Login();
$login->Acesso();

$menus = new Menu();
$menu = $menus->SelecionarMenu($_SESSION['perfil']);

$viatura = new Viatura();
$tabela_relacao_vtr = $viatura->ViaturasRodando();

$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->display('./headers/header_datatables.tpl');

/* if(isset($_SESSION['erro'])){
    if($_SESSION['erro'] == 1){
        $erro = "Usuário ou senha inválidos";
        unset($_SESSION['erro']);
    } 
} */
if (!empty($_SESSION['erro'])) {
    $smarty->assign('erro', "Usuário ou senha inválidos");
} else {
    $smarty->assign('erro', NULL);
}

$smarty->display($menu);
$smarty->display('home.tpl');
$smarty->display('./footer/footer_inicio.tpl');
/* if(!empty($_SESSION['key'])){
    $smarty->assign('token', $_SESSION['key']);
} else {
    $_SESSION['key'] = md5(uniqid(rand(), TRUE));
    $smarty->assign('token', $_SESSION['key']);
} */
unset($_SESSION['erro']);