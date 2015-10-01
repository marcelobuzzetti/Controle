<?php

$contador = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_recibo_combustivel,combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo,qnt, motivo, data, hora
                                           FROM tipos_combustiveis,combustiveis,recibos_combustiveis
                                           WHERE recibos_combustiveis.id_combustivel =combustiveis.id_combustivel
                                           AND recibos_combustiveis.id_tipo_combustivel =tipos_combustiveis.id_tipo_combustivel; ");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table border=2px style='width:100%'>
                 <caption>Combustível Recebido</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td>Tipo</td>
                        <td>Quantidade</td>
                        <td>Motivo</td>
                        <td>Data</td>
                        <td>Hora</td>
                        <td></td>
                        <td></td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr>";
            echo "<td>$contador</td>";
            echo "<td>" . $reg->combustivel . "</td>";
            echo "<td>" . $reg->tipo . "</td>";
            echo "<td>" . $reg->qnt . "</td>";
            echo "<td>" . $reg->motivo . "</td>";
            echo "<td>" . date('d M Y', strtotime($reg->data)) . "</td>";
            echo "<td>" . $reg->hora . "</td>";
            echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_recibo_combustivel . "' value='" . $reg->id_recibo_combustivel . "' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_rcb_comb'/>Apagar Recebimento de Combustível</form></td>";
            echo "</form>";
            echo "<form action='update_rcb_comb.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_recibo_combustivel . "' value='" . $reg->id_recibo_combustivel . "' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/>Atualizar Recebimento de Combustível</form></td>";
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
