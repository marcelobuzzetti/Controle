<?php
include '../include/config.inc.php';

$smarty->display('./headers/header.tpl');
$smarty->display('./erros/404.tpl');
$smarty->display('./footer/footer.tpl');

?>