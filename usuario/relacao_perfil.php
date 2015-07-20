<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT descricao FROM perfil");
           $executa = $stmt->execute();

           if($executa){
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->descricao."'>".$reg->descricao."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
