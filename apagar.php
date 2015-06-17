<?php 
$id = $_GET['id'];
include 'conexao.php';
try{
$stmt = $pdo->prepare("DELETE FROM percursos WHERE id_percurso=".$id); 
$executa = $stmt->execute();
 
}catch(PDOException $e){
      echo $e->getMessage();
   }
   
include 'index.php'   
?> 
