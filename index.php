<?php

session_start();

if ($_SESSION['erro'] == 1) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Usuário e/ou Senha não cadastrados</strong>
                         </div>";
}
if ($_SESSION['timeout'] == 1) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Realizar o Login</strong>
                         </div>";
}
session_destroy();

require_once $_SERVER['DOCUMENT_ROOT'].'/Site/vendor/autoload.php';

$viatura = new Viatura();
$tabela_relacao_vtr = $viatura->ViaturasRodando();

$smarty = new Smarty();
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/view/';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/templates_c/';
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/Site/cache/';
$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->display('./headers/header.tpl');
$smarty->display('home.tpl');
?>