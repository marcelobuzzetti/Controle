<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT viatura "
                   . "            FROM viaturas "
                   . "            WHERE viatura "
                   . "            NOT IN (SELECT viatura "
                   . "            FROM percursos "
                   . "            WHERE data_retorno IS NULL)"
                   . "            AND situacao != 'Indisponível'"
                   . "            ORDER BY viatura");
           $executa = $stmt->execute();

           if($executa){
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->viatura."'>".$reg->viatura."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
