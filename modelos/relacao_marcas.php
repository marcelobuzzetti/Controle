<?php

include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT * FROM marcas");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<option value=''>Selecione a marca</option>";
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<option value='" . $reg->id_marca . "'>" . $reg->descricao . "</option>";
        }
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
