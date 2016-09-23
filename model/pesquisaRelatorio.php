<?php

include '../model/conexao.php';

$texto = "%" . $_GET['pesquisa_relatorio'] . "%";

$stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                    FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                    WHERE percursos.id_motorista = motoristas.id_motorista
                                    AND percursos.id_viatura = viaturas.id_viatura
                                    AND viaturas.id_marca = marcas.id_marca
                                    AND viaturas.id_modelo = modelos.id_modelo 
                                    AND percursos.id_destino = destinos.id_destino
                                    AND (marcas.descricao LIKE ? OR modelos.descricao LIKE ? OR placa LIKE ? OR motoristas.apelido LIKE ? OR destinos.nome_destino LIKE ? OR odo_saida LIKE ? OR acompanhante LIKE ? OR data_saida LIKE ? OR  hora_saida LIKE ? OR odo_retorno LIKE ? OR data_retorno LIKE ? OR hora_retorno LIKE ?)
                                    ORDER BY data_saida, hora_saida");
$stmt->bindParam(1, $texto, PDO::PARAM_STR);
$stmt->bindParam(2, $texto, PDO::PARAM_STR);
$stmt->bindParam(3, $texto, PDO::PARAM_STR);
$stmt->bindParam(4, $texto, PDO::PARAM_STR);
$stmt->bindParam(5, $texto, PDO::PARAM_STR);
$stmt->bindParam(6, $texto, PDO::PARAM_STR);
$stmt->bindParam(7, $texto, PDO::PARAM_STR);
$stmt->bindParam(8, $texto, PDO::PARAM_STR);
$stmt->bindParam(9, $texto, PDO::PARAM_STR);
$stmt->bindParam(10, $texto, PDO::PARAM_STR);
$stmt->bindParam(11, $texto, PDO::PARAM_STR);
$stmt->bindParam(12, $texto, PDO::PARAM_STR);
$executa = $stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table class='table table-striped table-hover' text-align='center'>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
            </tr>
            ";
foreach ($resultado as $tbl) {
    echo "<tr>";
    echo "<td>" . $tbl['marca'] . " - " . $tbl['modelo'] . " - " . $tbl['placa'] . "</td>
                    <td>" . $tbl['apelido'] . "</td>
                    <td>" . $tbl['destino'] . "</td>
                    <td>" . $tbl['odo_saida'] . "</td>
                    <td>" . $tbl['acompanhante'] . "</td>
                    <td>" . $tbl['data_saida'] . "</td>
                    <td>" . $tbl['hora_saida'] . "</td>
                    <td>" . $tbl['odo_retorno'] . "</td>
                    <td>" . $tbl['data_retorno'] . "</td>
                    <td>" . $tbl['hora_retorno'] . "</td>
                </tr>";
}
echo "</table>";
?>