<?php
switch ($_POST['enviar']) {
case 'Retornou':
    $id = $_POST['id'];
    $odo_retorno = $_POST['odo_retorno'];
    include 'conexao.php';
        try{
            $stmt = $pdo->prepare("UPDATE percursos SET odo_retorno=$odo_retorno, data_retorno=NOW(), hora_retorno=NOW() WHERE id_percurso=".$id); 
            $executa = $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
            
        }
   
header('Location: index.php') ; 

   break;

case 'Apagar':
    $id = $_POST['id'];
	include 'conexao.php';
	try{
		$stmt = $pdo->prepare("DELETE FROM percursos WHERE id_percurso=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
header('Location: index.php') ; 
   
   break;

case 'Cadastrar':
	$viatura = $_POST["viatura"];
	$motorista = $_POST["motorista"];
	$destino = $_POST["destino"];
	$odometro = $_POST["odo_saida"];
	$acompanhantes = $_POST["acompanhantes"];

	include 'conexao.php';
	try{
		$stmt = $pdo->prepare("INSERT INTO percursos VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL,NULL)"); 
		$stmt->bindParam(1, $viatura , PDO::PARAM_STR);
		$stmt->bindParam(2, $motorista , PDO::PARAM_STR);
		$stmt->bindParam(3, $destino , PDO::PARAM_STR);
		$stmt->bindParam(4, $odometro, PDO::PARAM_INT);
		$stmt->bindParam(5, $acompanhantes, PDO::PARAM_STR);
		$executa = $stmt->execute();
 
    if($executa){
          // echo "<div class='jumbotron'>
          //          <div class='container'>
          //              <h3>Viatura Cadastrada</h1>
          //          </div>
          //      </div>";
    }else{
           echo "Erro ao inserir os dados";
       }
   }catch(PDOException $e){
		echo $e->getMessage();
   }
 
header('Location: index.php') ; 

case 'Login':
$login = $_POST['login'];
$senha = md5($_POST['senha']);

$sth = $dbh->prepare('SELECT COUNT(*) AS total FROM usuario WHERE login = ? AND senha = ?');

$sth->execute(array($login, $senha));

$resultado = $sth->fetch();

if($resultado['total'] > 0){
    session_start();
    $_SESSION['login'] = $login;
    echo 'Login com Sucesso!';
}else{
    echo 'Erro no Login!';
}
	break;
        
 
case 'viatura':
        $viatura = $_POST["viatura"];
	$modelo = $_POST["modelo"];
	$placa = $_POST["placa"];
	$odometro = $_POST["odometro"];
	$cap_tanque = $_POST["cap_tanque"];
        $cons_padrao = $_POST["cons_padrao"];
        $cap_transp = $_POST["cap_transp"];
        $situacao = $_POST["situacao"];
        echo $viatura;
        echo $modelo;
        echo $placa;
        echo $odometro;
        echo $cap_tanque;
        echo $cons_padrao;
        echo $cap_transp;
        echo $situacao;
        
                

	include 'conexao.php';
	try{
		$stmt = $pdo->prepare("INSERT INTO viaturas VALUES(NULL,?,?,?,?,?,?,?,?)"); 
		$stmt->bindParam(1, $viatura , PDO::PARAM_STR);
		$stmt->bindParam(2, $modelo , PDO::PARAM_STR);
		$stmt->bindParam(3, $placa , PDO::PARAM_STR);
		$stmt->bindParam(4, $odometro, PDO::PARAM_INT);
		$stmt->bindParam(5, $cap_tanque, PDO::PARAM_INT);
                $stmt->bindParam(6, $cons_padrao, PDO::PARAM_INT);
                $stmt->bindParam(7, $cap_transp, PDO::PARAM_INT);
                $stmt->bindParam(8, $situacao, PDO::PARAM_STR);
		$executa = $stmt->execute();
 
    if($executa){
          // echo "<div class='jumbotron'>
          //          <div class='container'>
          //              <h3>Viatura Cadastrada</h1>
          //          </div>
          //      </div>";
    }else{
           echo "Erro ao inserir os dados";
       }
   }catch(PDOException $e){
		echo $e->getMessage();
   }
 
header('Location: /controle/viatura') ; 
    
    break;

case 'motorista':
    $motorista = $_POST['nome'];
    $categoria = $_POST['categoria'];
    
    include 'conexao.php';
	try{
		$stmt = $pdo->prepare("INSERT INTO motorista VALUES(NULL,?,?)"); 
		$stmt->bindParam(1, $motorista , PDO::PARAM_STR);
		$stmt->bindParam(2, $categoria , PDO::PARAM_STR);
		$executa = $stmt->execute();
 
    if($executa){
          // echo "<div class='jumbotron'>
          //          <div class='container'>
          //              <h3>Viatura Cadastrada</h1>
          //          </div>
          //      </div>";
    }else{
           echo "Erro ao inserir os dados";
       }
   }catch(PDOException $e){
		echo $e->getMessage();
   }
 
header('Location: /controle/motorista') ; 
            
    break;

default:
   //no action sent
}
?>
