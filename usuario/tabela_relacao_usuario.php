<?php
$contador = 1;
include '../conexao.php';
 try{
     $stmt = $pdo->prepare("SELECT id_usuario,login,descricao "
             . "            FROM usuarios, perfil"
             . "            WHERE cod_perfil = perfil ");
     $executa = $stmt->execute();
     
     if($executa){
         echo "<table border=2px>
                 <caption>Usuários Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Nome</td>
                        <td>Perfil</td>
                        <td></td>
                        <td></td>
                    </tr>";
         
         while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
             echo "<tr>";
             echo "<td>$contador</td>";
             echo "<td>".$reg->login."</td>";
             echo "<td>".$reg->descricao."</td>";
             echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='".$reg->id_usuario."' value='".$reg->id_usuario."' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_usuario'/>Apagar Usuário</form></td>";
             echo "</form>";
             echo "<form action='update_usuario.php' method='post'>
                                    <input type='hidden' id='".$reg->id_usuario."' value='".$reg->id_usuario."' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_usuario'/>Atualizar Usuário</form></td>";
             echo "</form></tr>";
             $contador++;
         }
         echo "</table>";
         }else{
             echo 'Erro ao inserir os dados';
         }
   }catch(PDOException $e){
      echo $e->getMessage();
   }
?>
