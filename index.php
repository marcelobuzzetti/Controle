<?php

include __DIR__.'/include/config.inc.php';

$login = new Login();
$login->Acesso();

$viatura = new Viatura();
$tabela_relacao_vtr = $viatura->ViaturasRodando();

$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->display('./headers/header.tpl');
$smarty->display('home.tpl');
$smarty->display('./footer/footer.tpl');

?>