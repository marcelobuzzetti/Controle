<?php

require_once('vendor/autoload.php');

$viatura = new Viatura();
$tabela_relacao_vtr = $viaturas->ViaturasRodando();
       
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

$smarty = new Smarty();
$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->display('./templates/home/index.tpl');
?>