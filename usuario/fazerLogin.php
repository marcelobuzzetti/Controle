<?php
include '../conexao.php';

$login = $_POST['login'];
$senha = md5($_POST['senha']);

try{
		$stmt = $pdo->prepare('SELECT COUNT(*) AS total FROM usuario WHERE login = ? AND senha = ?'); 
		$stmt->bindParam(1, $login , PDO::PARAM_STR);
		$stmt->bindParam(2, $senha, PDO::PARAM_STR);
                $stmt->execute();
                
                $resultado = $stmt->fetch();
                
                $stmt = $pdo->prepare('SELECT perfil FROM usuario WHERE login = ?'); 
		$stmt->bindParam(1, $login , PDO::PARAM_STR);
		$stmt->execute();
                
                $resultado1 = $stmt->fetch();
                
    if($resultado['total'] > 0){
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['perfil'] = $resultado1[0];
    header ('Location: ../percurso/index.php');
    
}else{
    echo 'Erro no Login!';
    header ('Location: ../percurso/index.php');
}
}catch(PDOException $e){
		echo $e->getMessage();
   }
?>