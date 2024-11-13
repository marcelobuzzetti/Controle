<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';

$viaturas = new Viatura();
$tabela_existencia = $viaturas->listarViaturas();
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');
echo json_encode($tabela_existencia);

?>
