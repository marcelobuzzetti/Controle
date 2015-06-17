<?php 
$viatura = $_POST["viatura"];
$motorista = $_POST["motorista"];
$destino = $_POST["destino"];
$odometro = $_POST["odo_saida"];
$acompanhantes = $_POST["acompanhantes"];

include 'conexao.php';
try{
$stmt = $pdo->prepare("INSERT INTO percursos VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL)"); 
$stmt->bindParam(1, $viatura , PDO::PARAM_STR);
$stmt->bindParam(2, $motorista , PDO::PARAM_STR);
$stmt->bindParam(3, $destino , PDO::PARAM_STR);
$stmt->bindParam(4, $odometro, PDO::PARAM_INT);
$stmt->bindParam(5, $acompanhantes, PDO::PARAM_STR);
$executa = $stmt->execute();
 
       if($executa){
           echo "<div class='jumbotron'>
                    <div class='container'>
                        <h3>Viatura Cadastrada</h1>
                    </div>
                </div>";
       }
       else{
           echo "Erro ao inserir os dados";
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
 
include 'index.php';
?>