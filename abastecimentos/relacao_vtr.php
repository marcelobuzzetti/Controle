<?php

include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                               FROM viaturas, marcas, modelos
                                               WHERE viaturas.id_marca = marcas.id_marca AND
                                               viaturas.id_modelo = modelos.id_modelo");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<option value=''>Selecione a Viatura</option>";
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<option value='" . $reg->id_viatura . "'>" . $reg->marca . " - " . $reg->modelo . " - " . $reg->placa . "</option>";
        }
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
