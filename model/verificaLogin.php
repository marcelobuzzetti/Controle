<?php

include '../model/conexao.php';

$login = htmlentities($_GET['login']);

$stmt = $pdo->prepare("SELECT count(id_usuario) AS qnt FROM usuarios WHERE login =  ?");
$stmt->bindParam(1, $login, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_OBJ);

$qnt = $resultado->qnt;

if ($qnt > 0) {
    echo "<script>$('#usuario').attr('style','border:3px solid #7FFF00;');</script>";
} else {
    echo "<script> $('#usuario').attr('style','border-color: red;');</script>";
}
?>