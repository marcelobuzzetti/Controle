<?php
$contador = 1;
include '../conexao.php';
 try{
       $stmt = $pdo->prepare("SELECT id_viatura, viatura, modelo, placa, odometro, cap_tanque, consumo_padrao, cap_transp, habilitacao.categoria, situacao.disponibilidade
                                FROM viaturas, habilitacao, situacao
                                WHERE habilitacao = id_habilitacao
                                AND situacao = id_situacao ");
       $executa = $stmt->execute();
 
       if($executa){
           echo "<table border=2px style='width:100%'>
                 <caption>Viaturas Cadastradas</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Viatura</td>
                        <td>Modelo</td>
                        <td>Placa</td>
                        <td>Odômetro</td>
                        <td>Capacidade do Tanque</td>
                        <td>Consumo Km/L</td>
                        <td>Capacidade(Pessoas)</td>
                        <td>Habilitação Necessária</td>
                        <td>Situação</td>
                        <td></td>
                        <td></td>
                        </tr>";
           
            while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
		echo "<tr>";
                echo "<td>$contador</td>";
                echo "<td>".$reg->viatura."</td>";
                echo "<td>".$reg->modelo."</td>";
                echo "<td>".$reg->placa."</td>";
                echo "<td>".$reg->odometro."</td>";
                echo "<td>".$reg->cap_tanque."</td>";
                echo "<td>".$reg->consumo_padrao."</td>";
                echo "<td>".$reg->cap_transp."</td>";
                echo "<td>".$reg->categoria."</td>";
                echo "<td>".$reg->disponibilidade."</td>";
                echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->id_viatura."' value='".$reg->id_viatura."' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_viatura'/>Apagar Viatura</form></td>";
                echo "</form>";
                echo "<form action='update_viatura.php' method='post'>
                                    <input type='hidden' id='".$reg->id_viatura."' value='".$reg->id_viatura."' name='id'/>
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
