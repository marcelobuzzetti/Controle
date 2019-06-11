<?php
include '../include/config.inc.php';

$existencia_combustivel = new CombustivelExistencia();
$tabela_existencia = $existencia_combustivel->listarCombustiveisExistentes();
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');
echo json_encode($tabela_existencia);

?>