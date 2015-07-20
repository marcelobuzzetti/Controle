<?php
    $contador = 1;
    include 'conexao.php';
    
    try{
        $stmt = $pdo->prepare("SELECT * FROM percursos WHERE data_retorno IS NOT NULL ORDER BY id_percurso DESC");
        $executa = $stmt->execute();

        if($executa){
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
            
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                echo "<tr><td>".$reg->viatura."</td>";
                echo "<td>".$reg->motorista."</td>";
                echo "<td>".$reg->destino."</td>";
                echo "<td>".$reg->odo_saida."</td>";
                echo "<td>".$reg->acompanhantes."</td>";
                echo "<td>".$reg->data_saida."</td>";
                echo "<td>".$reg->hora_saida."</td>";
                echo "<td>".$reg->odo_retorno."</td>";
                echo "<td>".$reg->data_retorno."</td>";
                echo "<td>".$reg->hora_retorno."</td>";
                echo "</tr>";
                $contador++;
            }
            echo "</tr></table>";
            }else{
                echo 'Erro ao inserir os dados';
           }
       }catch(PDOException $e){
          echo $e->getMessage();
       }
?>