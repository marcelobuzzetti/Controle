<?php
$contador1 = 1;
include 'conexao.php';
 try{
     $stmt = $pdo->prepare("SELECT * FROM viaturasrodando");
     $executa = $stmt->execute();
     
     if($executa){
         echo "<table class='table'>
                 <caption>Viaturas Rodando</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Ch Vtr</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>";
         
         while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
             echo "<tr>";
             echo "<td>$contador1</td>";
             echo "<td>".$reg->viatura."</td>";
             echo "<td>".$reg->apelido."</td>";
             echo "<td>".$reg->destino."</td>";
             echo "<td>".$reg->odo_saida."</td>";
             echo "<td>".$reg->ch_vtr."</td>";
             echo "<td>".date('d M Y', strtotime($reg->data_saida))."</td>";
             echo "<td>".$reg->hora_saida."</td>";
             echo "</tr>";
             $contador1++;
         }
         echo "</table>";
         }else{
             echo 'Erro ao inserir os dados';
         }
   }catch(PDOException $e){
      echo $e->getMessage();
   }
?>
