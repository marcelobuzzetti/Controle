<?php
    include '../conexao.php';

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['perfil'];

    try{
        $stmt = $pdo->prepare("SELECT id_perfil FROM perfil WHERE descricao = ?)"); 
        $stmt->bindParam(1, $perfil, PDO::PARAM_STR);
        $executa = $stmt->execute();
        $perfil = $executa;
        $stmt = $pdo->prepare("INSERT INTO usuario VALUES(NULL,?,?,?)"); 
        $stmt->bindParam(1, $login , PDO::PARAM_STR);
        $stmt->bindParam(2, $senha, PDO::PARAM_STR);
        $stmt->bindParam(3, $perfil, PDO::PARAM_INT);
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