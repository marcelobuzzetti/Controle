<?php
$contador = 1;
include '../conexao.php';
 try{
       $stmt = $pdo->prepare("SELECT * FROM tipo_comb; ");
       $executa = $stmt->execute();
 
       if($executa){
           echo "<table border=2px style='width:100%'>
                 <caption>Tipo de Combustíveis Cadastradss</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td></td>
                        <td></td>
                        </tr>";
           
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
		echo "<tr>";
                echo "<td>$contador</td>";
                echo "<td>".$reg->tp_comb_desc."</td>";
                echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->tp_comb_id."' value='".$reg->tp_comb_id."' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_tipocomb'/>Apagar Tipo de Combustível</form></td>";
                echo "</form>";
                echo "<form action='update_tipo_comb.php' method='post'>
                                    <input type='hidden' id='".$reg->tp_comb_id."' value='".$reg->tp_comb_id."' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipocomb'/>Atualizar Tipo de Combustível</form></td>";
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
