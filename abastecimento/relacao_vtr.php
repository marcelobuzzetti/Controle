<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT id_viatura,viatura,modelo,placa "
                   . "            FROM viaturas "
                   . "            ORDER BY viatura");
           $executa = $stmt->execute();

           if($executa){
               echo "<option value=''>Selecione a Viatura</option>";
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->id_viatura."'>".$reg->viatura." - ".$reg->modelo." - ".$reg->placa."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
