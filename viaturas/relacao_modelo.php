<?php

include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT * FROM modelos");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<option value=''>Selecione o Modelo</option>";
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<option value='" . $reg->id_modelo . "'>" . $reg->descricao . "</option>";
        }
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>