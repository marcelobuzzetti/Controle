<?php
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

$ip = "10.12.133.67";
$test = "";
    $ll = exec('ping -c2 ' . $ip, $output, $retVar);
    if($retVar == 0){
#        echo "The IP address, $ip, is alive";
        $test = json_encode(array("teste" => 0));

    } else {
#        echo "The IP address, $ip, is dead";
        $test = json_encode(array("teste" => 1));
    }

echo $test;

