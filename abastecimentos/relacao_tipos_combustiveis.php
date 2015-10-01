<?php

include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT tipos_combustiveis.id_tipo_combustivel AS id_tipo, descricao 
                                               FROM tipos_combustiveis, recibos_combustiveis
                                               WHERE tipos_combustiveis.id_tipo_combustivel IN (SELECT recibos_combustiveis.id_tipo_combustivel FROM recibos_combustiveis)");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<option value=''>Selecione o Tipo</option>";
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<option value='" . $reg->id_tipo . "'>" . $reg->descricao . "</option>";
        }
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
