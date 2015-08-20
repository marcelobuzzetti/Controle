<?php
$contador = 1;
include '../conexao.php';
 try{
       $stmt = $pdo->prepare("SELECT rcb_id,tipo_comb.tp_comb_desc, tipo.tp_desc,rcb_comb.rcb_qnt, rcb_comb.rcb_motivo, rcb_comb.rcb_data, rcb_comb.rcb_hora 
                                           FROM tipo,tipo_comb,rcb_comb
                                           WHERE rcb_tp_comb = tp_comb_id                                          
                                           AND rcb_tp = tp_id ");
       $executa = $stmt->execute();
 
       if($executa){
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
           
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
		echo "<tr>";
                echo "<td>$contador</td>";
                echo "<td>".$reg->tp_comb_desc."</td>";
                echo "<td>".$reg->tp_desc."</td>";
                echo "<td>".$reg->rcb_qnt."</td>";
                echo "<td>".$reg->rcb_motivo."</td>";
                echo "<td>".date('d M Y', strtotime($reg->rcb_data))."</td>";
                echo "<td>".$reg->rcb_hora."</td>";
                echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->rcb_id."' value='".$reg->rcb_id."' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_rcb_comb'/>Apagar Combustível</form></td>";
                echo "</form>";
                 echo "<form action='update_rcb_comb.php' method='post'>
                                    <input type='hidden' id='".$reg->rcb_id."' value='".$reg->rcb_id."' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/>Atualizar Viatura</form></td>";
                echo "</form></tr>";
                
                $contador++;
                
            }
            echo "</table>";
        }else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>
