<?php
    include '../conexao.php';

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    try{
        $stmt = $pdo->prepare("INSERT INTO usuario VALUES(NULL,?,?)"); 
        $stmt->bindParam(1, $login , PDO::PARAM_STR);
        $stmt->bindParam(2, $senha, PDO::PARAM_STR);
        $executa = $stmt->execute();

        if($executa){
              //Colocar Script
        }else{
               echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: cadastrar_usuario.php') ; 
?>