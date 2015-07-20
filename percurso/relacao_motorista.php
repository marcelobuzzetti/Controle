<?php 
    include 'conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT * FROM motorista ORDER BY nome");
           $executa = $stmt->execute();

           if($executa){
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->nome."'>".$reg->nome."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
