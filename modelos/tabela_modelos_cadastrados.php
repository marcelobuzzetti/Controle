<?php

$contador = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_modelo, marcas.descricao AS marca, modelos.descricao AS descricao, cap_tanque, consumo_padrao, cap_transp, habilitacoes.categoria AS habilitacao
                                     FROM modelos, habilitacoes, marcas
                                     WHERE modelos.id_habilitacao = habilitacoes.id_habilitacao
                                     AND modelos.id_marca = marcas.id_marca;");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table border=2px style='width:100%'>
                 <caption>Modelos Cadastradas</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Marca</td>
                        <td>Modelo</td>
                        <td>Capacidade do Tanque</td>
                        <td>Consumo Km/L</td>
                        <td>Capacidade(Pessoas)</td>
                        <td>Habilitação Necessária</td>
                        <td></td>
                        <td></td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr>";
            echo "<td>$contador</td>";
            echo "<td>" . $reg->marca . "</td>";
            echo "<td>" . $reg->descricao . "</td>";
            echo "<td>" . $reg->cap_tanque . "</td>";
            echo "<td>" . $reg->consumo_padrao . "</td>";
            echo "<td>" . $reg->cap_transp . "</td>";
            echo "<td>" . $reg->habilitacao . "</td>";
            echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_modelo . "' value='" . $reg->id_modelo . "' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_modelo'/>Apagar Modelo</form></td>";
            echo "</form>";
            echo "<form action='update_modelo.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_modelo . "' value='" . $reg->id_modelo . "' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_modelo'/>Atualizar Modelo</form></td>";
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
