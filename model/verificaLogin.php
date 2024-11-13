<?php

include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$login = htmlspecialchars($_GET['login']);

$stmt = $pdo->prepare("SELECT count(id_usuario) AS qnt FROM usuarios WHERE login =  ?");
$stmt->bindParam(1, $login, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($login == NULL) {
    echo "<script> $('#enviar').attr('disabled','disabled'); $('#login').attr('style','border-color: red;  box-shadow: 1px 1px 2px black, 0 0 25px red, 0 0 5px red;');$('#validaLogin').removeClass('glyphicon-pencil glyphicon-ok glyphicon-remove text-success').addClass('glyphicon-pencil text-danger');</script>";
} else {
    if ($qnt > 0) {
        echo "<script> $('#enviar').attr('disabled','disabled'), $('#login').attr('style','border-color: red; box-shadow: 1px 1px 2px black, 0 0 25px red, 0 0 5px red;'); $('#validaLogin').removeClass('glyphicon-pencil glyphicon-ok text-success').addClass('glyphicon-remove text-danger');</script>";
    } else {
        echo "<script> $('#enviar').removeAttr('disabled'), $('#login').removeAttr('style').attr('style','border-color: green; box-shadow: 1px 1px 2px black, 0 0 25px green, 0 0 5px green;');; $('#validaLogin').removeClass('glyphicon-pencil glyphicon-remove text-danger').addClass('glyphicon-ok text-success');</script>";
    }
}
?>