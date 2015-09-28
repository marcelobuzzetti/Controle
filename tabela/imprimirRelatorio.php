<html>
    <head>
        <meta charset="UTF-8">
        <script src="../js/jquery.js"></script>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/bootstrap.js"></script>
        <script src="../js/script.js"></script>
        <script>self.print()</script>
        <title>Relatório do Sv</title>
    </head>
    <body>        
          <?php
            include '../conexao.php';
            include "verificarLogin.php";
            include '../sessao.php';
             $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];
            
            try{
                    $stmt = $pdo->prepare("SELECT id_percurso, viaturas.viatura, motoristas.apelido, destino, odo_saida, ch_vtr, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                FROM percursos, viaturas, motoristas
                                WHERE data_saida BETWEEN ? AND ?
                                AND percursos.motorista = id_motorista
                                AND percursos.viatura = id_viatura 
                                "); 
                    $stmt->bindParam(1, $data_inicio , PDO::PARAM_STR);
                    $stmt->bindParam(2, $data_fim, PDO::PARAM_STR);
                    $executa = $stmt->execute();
       
                    if($executa){
                        echo "<table class='table table-bordered' text-align='center'>
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
                            echo "<td>".$reg->apelido."</td>";
                            echo "<td>".$reg->destino."</td>";
                            echo "<td>".$reg->odo_saida."</td>";
                            echo "<td>".$reg->ch_vtr."</td>";
                            echo "<td>".date('d M Y', strtotime($reg->data_saida))."</td>";
                            echo "<td>".$reg->hora_saida."</td>";
                            echo "<td>".$reg->odo_retorno."</td>";
                            echo "<td>".date('d M Y', strtotime($reg->data_retorno))."</td>";
                            echo "<td>".$reg->hora_retorno."</td>";
                            echo "</tr>";
                        }
                        echo "</tr></table>";
                        
                        }else{
                            
                       }
                   }catch(PDOException $e){
                      echo $e->getMessage();
                   }
                   unset($_POST['data_inicio']);
                   unset($_POST['data_fim']);
          ?>
    </body>
</html>
