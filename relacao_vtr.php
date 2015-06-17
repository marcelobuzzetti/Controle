<?php
 $pdo = new PDO("mysql:host=localhost;dbname=controle", "root", "apollo87"); 
 if(!$pdo){
       die("Erro ao criar a conexão");
 }
 try{
       $stmt = $pdo->prepare("SELECT * FROM percursos");
       $executa = $stmt->execute();
 
       if($executa){
           echo "<table border=2px text-align='center'>
                    <tr>
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
                echo "<td align='center' name='viatura' id='".$reg->viatura."'value='".$reg->viatura."'>".$reg->viatura."</td>";
                echo "<td align='center' name='".$reg->motorista."' id='".$reg->motorista."'>".$reg->motorista."</td>";
                echo "<td align='center' name='".$reg->destino."' id='".$reg->destino."'>".$reg->destino."</td>";
                echo "<td align='center' name='".$reg->odo_saida."' id='".$reg->odo_saida."'>".$reg->odo_saida."</td>";
                echo "<td align='center' name='".$reg->acompanhantes."' id='".$reg->acompanhantes."'>".$reg->acompanhantes."</td>";
                echo "<td align='center' name='".$reg->data_saida."' id='".$reg->data_saida."'>".$reg->data_saida."</td>";
                echo "<td align='center' name='".$reg->hora_saida."' id='".$reg->hora_saida."'>".$reg->hora_saida."</td>";
                echo "<td align='center' name='".$reg->data_chegada."' id='".$reg->data_chegada."'>".$reg->data_chegada."</td>";
                echo "<td align='center' name='".$reg->hora_chegada."' id='".$reg->hora_chegada."'>".$reg->hora_chegada."</td>";
                echo "<td><input type='submit' name='retornou' value='Retornou' onclick='retorno.php'/></td>";
                echo "<td><input type='submit' name='apagar' value='Apagar'/></td>";
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