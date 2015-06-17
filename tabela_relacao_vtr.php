<?php
include 'conexao.php';
 try{
       $stmt = $pdo->prepare("SELECT * FROM percursos");
       $executa = $stmt->execute();
 
       if($executa){
           echo "<table border=2px text-align='center'>
                    <tr>
                        <td>Id</td>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odomêntro Saída</td>
                        <td>Acompanhantes</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                        <td>Data Chegada</td>
                        <td>Hora Chegada</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>";
           
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                echo "<td align='center' >".$reg->id_percurso."</td>";
                echo "<td align='center' >".$reg->viatura."</td>";
                echo "<td align='center' >".$reg->motorista."</td>";
                echo "<td align='center' >".$reg->destino."</td>";
                echo "<td align='center' >".$reg->odo_saida."</td>";
                echo "<td align='center' >".$reg->acompanhantes."</td>";
                echo "<td align='center' >".$reg->data_saida."</td>";
                echo "<td align='center' >".$reg->hora_saida."</td>";
                echo "<td align='center' >".$reg->data_retorno."</td>";
                echo "<td align='center' >".$reg->hora_retorno."</td>";
                echo "<td><a class='btn btn-success' href='retorno.php?id=".$reg->id_percurso."'>Retornou</a></td>";
                echo "<td><a class='btn btn-danger' href='apagar.php?id=".$reg->id_percurso."'>Apagar</a></td>";
                echo "</tr>"."<tr>";
            }
            echo "</tr>
            </table>";
        }else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>