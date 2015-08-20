<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT * FROM tipo");
           $executa = $stmt->execute();

           if($executa){
               echo "<option value=''>Selecione o Tipo</option>";
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->tp_id."'>".$reg->tp_desc."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
