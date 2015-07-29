<?php
    include '../conexao.php';
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['perfil'];
    $apelido = $_POST['apelido'];

    try{
        $stmt = $pdo->prepare("INSERT INTO usuarios VALUES(NULL,?,?,?,?)"); 
        $stmt->bindParam(1, $login , PDO::PARAM_STR);
        $stmt->bindParam(2, $senha, PDO::PARAM_STR);
        $stmt->bindParam(3, $perfil, PDO::PARAM_INT);
        $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
        $executa = $stmt->execute();

        if($executa){
              //Colocar Script
        }else{
               echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: '.$endereco.'/usuario/cadastrar_usuario.php') ; 
?>