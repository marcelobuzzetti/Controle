<?php
$contador = 1;
include '../conexao.php';
 try{
       $stmt = $pdo->prepare("SELECT abast_id, abast_nrvale, motoristas.apelido, viatura, modelo, placa, tp_comb_desc, tp_desc, abast_qnt, abast_hora, abast_data
                                           FROM abastecimentos,motoristas,viaturas, tipo, tipo_comb
                                           WHERE abast_tipo_comb = tp_comb_id                                          
                                           AND abast_tipo = tp_id
                                           AND abast_motorista = id_motorista
                                           AND abast_vtr = id_viatura");
       $executa = $stmt->execute();
 
       if($executa){
           echo "<table border=2px style='width:100%'>
                 <caption>Combustível Recebido</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Nº Vale</td>
                        <td>Motorista</td>
                        <td>Viatura</td>
                        <td>Combustível</td>
                        <td>Tipo</td>
                        <td>Quantidade</td>
                        <td>Data</td>
                        <td>Hora</td>
                        <td></td>
                        <td></td>
                        </tr>";
           
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
		echo "<tr>";
                echo "<td>$contador</td>";
                echo "<td>".$reg->abast_nrvale."</td>";
                echo "<td>".$reg->apelido."</td>";
                echo "<td>".$reg->viatura." - ".$reg->placa." - ".$reg->modelo."</td>";
                echo "<td>".$reg->tp_comb_desc."</td>";
                echo "<td>".$reg->tp_desc."</td>";
                echo "<td>".$reg->abast_qnt."</td>";
                echo "<td>".date('d M Y', strtotime($reg->abast_data))."</td>";
                echo "<td>".$reg->abast_hora."</td>";
                echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->abast_id."' value='".$reg->abast_id."' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_abst'/>Apagar Abastecimento</form></td>";
                echo "</form>";
                 echo "<form action='update_abastecimento.php' method='post'>
                                    <input type='hidden' id='".$reg->abast_id."' value='".$reg->abast_id."' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/>Atualizar Abastecimento</form></td>";
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
