<?php
include '../conexao.php';
$endereco = $_SERVER['SERVER_NAME'].'/controle';
$login = $_POST['login'];
$senha = md5($_POST['senha']);

try{
		$stmt = $pdo->prepare('SELECT COUNT(*) AS total FROM usuarios WHERE login = ? AND senha = ?'); 
		$stmt->bindParam(1, $login , PDO::PARAM_STR);
		$stmt->bindParam(2, $senha, PDO::PARAM_STR);
                $stmt->execute();
                
                $resultado = $stmt->fetch();
                
                $stmt = $pdo->prepare('SELECT perfil, nome FROM usuarios WHERE login = ?'); 
		$stmt->bindParam(1, $login , PDO::PARAM_STR);
		$stmt->execute();
                
                                       $resultado1 = $stmt->fetch();
                
    if($resultado['total'] > 0){
        
        session_start();

       $_SESSION['login'] = $resultado1[1];
       $_SESSION['perfil'] = $resultado1[0];
       $_SESSION['temposessao'] = time() + 120;

       header ('Location: '.$endereco.'/percurso/index.php');
    
    }else{
        session_start();
        $_SESSION['erro'] = 1;
        header ('Location: '.$endereco.'');
    }
    }catch(PDOException $e){
		echo $e->getMessage();
   }
?>