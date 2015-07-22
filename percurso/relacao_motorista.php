<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT id_motorista, nome "
                   . "            FROM motoristas "
                   . "            WHERE id_motorista"
                   . "            NOT IN (SELECT motorista "
                   . "            FROM percursos "
                   . "            WHERE data_retorno IS NULL)"
                   . "            ORDER BY nome");
           $executa = $stmt->execute();

           if($executa){
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->id_motorista."'>".$reg->nome."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>