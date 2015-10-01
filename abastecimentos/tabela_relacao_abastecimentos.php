<?php

$contador = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_abastecimento, nrvale,  motoristas.apelido AS apelido, marcas.descricao AS marca, modelos.descricao AS modelo, viaturas.placa AS placa, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, data
                                           FROM abastecimentos, marcas, modelos, viaturas, motoristas, combustiveis, tipos_combustiveis
                                           WHERE abastecimentos.id_motorista = motoristas.id_motorista
                                           AND abastecimentos.id_viatura = viaturas.id_viatura
                                           AND abastecimentos.id_combustivel = combustiveis.id_combustivel
                                           AND abastecimentos.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                           AND viaturas.id_modelo = modelos.id_modelo
                                           AND viaturas.id_marca = marcas.id_marca;");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table border=2px style='width:100%'>
                 <caption>Abastecimentos</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Nº Vale</td>
                        <td>Motorista</td>
                        <td>Viatura</td>
                        <td>Combustível</td>
                        <td>Tipo</td>
                        <td>Quantidade</td>
                        <td>Data</td>
                        <td>Hora</td>
                        <td></td>
                        <td></td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr>";
            echo "<td>$contador</td>";
            echo "<td>" . $reg->nrvale . "</td>";
            echo "<td>" . $reg->apelido . "</td>";
            echo "<td>" . $reg->marca . " - " . $reg->placa . " - " . $reg->modelo . "</td>";
            echo "<td>" . $reg->combustivel . "</td>";
            echo "<td>" . $reg->tipo . "</td>";
            echo "<td>" . $reg->qnt . "</td>";
            echo "<td>" . date('d M Y', strtotime($reg->data)) . "</td>";
            echo "<td>" . $reg->hora . "</td>";
            echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_abastecimento . "' value='" . $reg->id_abastecimento . "' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_abst'/>Apagar Abastecimento</form></td>";
            echo "</form>";
            echo "<form action='update_abastecimento.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_abastecimento . "' value='" . $reg->id_abastecimento . "' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/>Atualizar Abastecimento</form></td>";
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
