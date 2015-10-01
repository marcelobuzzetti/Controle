<?php

$contador = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT * FROM tipos_combustiveis; ");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table border=2px style='width:100%'>
                 <caption>Tipo de Combustíveis Cadastradss</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Tipo</td>
                        <td></td>
                        <td></td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr>";
            echo "<td>$contador</td>";
            echo "<td>" . $reg->descricao . "</td>";
            echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_tipo_combustivel . "' value='" . $reg->id_tipo_combustivel . "' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_tipo'/>Apagar Tipo de Combustível</form></td>";
            echo "</form>";
            echo "<form action='update_tipo.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_tipo_combustivel . "' value='" . $reg->id_tipo_combustivel . "' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipo'/>Atualizar Tipo de Combustível</form></td>";
            echo "</form></tr>";

            $contador++;
        }
        echo "</table>";
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
