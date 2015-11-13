<?php

function __autoload($nomeClasse){
    //Verifica se existe a classe no diretório classes
    if(file_exists("localhost/controle/class/{$nomeClasse}.class.php")){
        //Se existe carrega
        include_once("localhost/controle/class/{$nomeClasse}.class.php");
    }
 
}