<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT id_viatura,viatura "
                   . "            FROM viaturas "
                   . "            WHERE id_viatura "
                   . "            NOT IN (SELECT viatura "
                   . "            FROM percursos "
                   . "            WHERE data_retorno IS NULL)"
                   . "            AND situacao != 2"
                   . "            ORDER BY viatura");
           $executa = $stmt->execute();

           if($executa){
               echo "<option value=''>Selecione a Viatura</option>";
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->id_viatura."'>".$reg->viatura."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
