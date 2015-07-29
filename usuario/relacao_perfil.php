<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT * FROM perfil");
           $executa = $stmt->execute();

           if($executa){
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->cod_perfil."'>".$reg->descricao."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
