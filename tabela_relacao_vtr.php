<?php

$contador1 = 1;
include 'conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                            FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                            WHERE data_retorno IS NULL 
                                            AND percursos.id_motorista = motoristas.id_motorista
                                            AND percursos.id_viatura = viaturas.id_viatura
                                            AND viaturas.id_marca = marcas.id_marca
                                            AND viaturas.id_modelo = modelos.id_modelo
                                            AND percursos.id_destino = destinos.id_destino
                                            ORDER BY id_percurso DESC");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table class='table'>
                 <caption>Viaturas Rodando</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Acompanhante</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<tr>";
            echo "<td>$contador1</td>";
            echo "<td>" . $reg->marca . " - " . $reg->modelo . " - " . $reg->placa . "</td>";
            echo "<td>" . $reg->apelido . "</td>";
            echo "<td>" . $reg->nome_destino . "</td>";
            echo "<td>" . $reg->odo_saida . "</td>";
            echo "<td>" . $reg->acompanhante . "</td>";
            echo "<td>" . date('d M Y', strtotime($reg->data_saida)) . "</td>";
            echo "<td>" . $reg->hora_saida . "</td>";
            echo "</tr>";
            $contador1++;
        }
        echo "</table>";
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
