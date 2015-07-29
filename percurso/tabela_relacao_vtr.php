<?php
    $contador = 0;
    $contador1 = 1;
    include '../conexao.php';
     try{
         $stmt = $pdo->prepare("SELECT id_percurso, viaturas.viatura, motoristas.apelido, destino, odo_saida, ch_vtr, data_saida, hora_saida
                                FROM percursos, viaturas, motoristas
                                WHERE data_retorno IS NULL 
                                AND percursos.motorista = id_motorista
                                AND percursos.viatura = id_viatura");
         $executa = $stmt->execute();

         if($executa){
             echo "<table class='table' >
                     <caption>Viaturas Rodando</caption>
                        <tr>
                            <td>Viatura</td>
                            <td>Motorista</td>
                            <td>Destino</td>
                            <td>Odômetro Saída</td>
                            <td>Ch Vtr</td>
                            <td>Data Saída</td>
                            <td>Hora Saída</td>
                            <td>Odômetro Chegada</td>
                            <td></td>
                            <td></td>
                        </tr>";
             
             while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                 echo "<form action='../executar.php' method='post' id='$contador'>
                 <tr><input type='hidden' style='width: 40px;text-align: right;border: 0px' readonly='readonly' name='id' id=$contador1 value='".$reg->id_percurso."'/>";
                 echo "<td>".$reg->viatura."</td>";
                 echo "<td>".$reg->apelido."</td>";
                 echo "<td>".$reg->destino."</td>";
                 echo "<td>".$reg->odo_saida."</td>";
                 echo "<td>".$reg->ch_vtr."</td>";
                 echo "<td>".date('d M Y', strtotime($reg->data_saida))."</td>";
                 echo "<td>".$reg->hora_saida."</td>";
                 echo "<td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required' min='".$reg->odo_saida."' style='width: 120px;'/></td>";
                 echo "<td><input class='btn btn-success' type='submit' id='retornou' name='enviar' value='Retornou'/></form></td>";
                 echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->id_percurso."' value='".$reg->id_percurso."' name='id'/>
                                    <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar' onclick='preenche($contador,".$reg->id_percurso.")'/></form></td>";
                 echo "</tr></form>";
                 $contador++;
                 $contador1++;
                }
                echo "</table></form>";
            }else{
               echo 'Erro ao inserir os dados';
           }
       }catch(PDOException $e){
          echo $e->getMessage();
       }
?>
