<?php 
    include '../conexao.php';
    try{
           $stmt = $pdo->prepare("SELECT tp_comb_id,tp_comb_desc
                                               FROM tipo_comb,rcb_comb
                                               WHERE tp_comb_id IN (SELECT rcb_tp_comb FROM rcb_comb) 
                                               AND tp_comb_id = rcb_tp_comb");
           $executa = $stmt->execute();

           if($executa){
               echo "<option value=''>Selecione o Combustível</option>";
              while($reg = $stmt->fetch(PDO::FETCH_OBJ)){ /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
                     echo "<option value='".$reg->tp_comb_id."'>".$reg->tp_comb_desc."</option>";
                }

              }else{
               echo 'Erro ao inserir os dados';
           }
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>
