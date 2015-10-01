<?php

include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT combustiveis.id_combustivel AS id_comb, descricao
                                               FROM combustiveis, recibos_combustiveis
                                               WHERE combustiveis.id_combustivel IN (SELECT recibos_combustiveis.id_combustivel FROM recibos_combustiveis)");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<option value=''>Selecione o Combustível</option>";
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<option value='" . $reg->id_comb . "'>" . $reg->descricao . "</option>";
        }
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
