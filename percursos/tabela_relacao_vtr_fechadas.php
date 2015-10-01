<?php

$contador = 1;
include '../conexao.php';

try {
    $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                            FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                            WHERE data_retorno IS NOT NULL 
                                            AND percursos.id_motorista = motoristas.id_motorista
                                            AND percursos.id_viatura = viaturas.id_viatura
                                            AND viaturas.id_marca = marcas.id_marca
                                            AND viaturas.id_modelo = modelos.id_modelo
                                            AND percursos.id_destino = destinos.id_destino
                                            AND data_retorno BETWEEN (SELECT DATE_SUB(date(now()), INTERVAL 7 DAY)) AND  (SELECT DATE(NOW()))
                                            ORDER BY id_percurso DESC");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table class='table' text-align='center'>
                     <caption>Viaturas Fechadas</caption>
                        <tr>
                            <td>Viatura</td>
                            <td>Motorista</td>
                            <td>Destino</td>
                            <td>Odômetro Saída</td>
                            <td>Ch Vtr</td>
                            <td>Data Saída</td>
                            <td>Hora Saída</td>
                            <td>Odômetro Retorno</td>
                            <td>Data Chegada</td>
                            <td>Hora Chegada</td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr><td>" . $reg->marca . " - " . $reg->modelo . " - " . $reg->placa . "</td>";
            echo "<td>" . $reg->apelido . "</td>";
            echo "<td>" . $reg->nome_destino . "</td>";
            echo "<td>" . $reg->odo_saida . "</td>";
            echo "<td>" . $reg->acompanhante . "</td>";
            echo "<td>" . date('d M Y', strtotime($reg->data_saida)) . "</td>";
            echo "<td>" . $reg->hora_saida . "</td>";
            echo "<td>" . $reg->odo_retorno . "</td>";
            echo "<td>" . date('d M Y', strtotime($reg->data_retorno)) . "</td>";
            echo "<td>" . $reg->hora_retorno . "</td>";
            echo "</tr>";
            $contador++;
        }
        echo "</tr></table>";
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>