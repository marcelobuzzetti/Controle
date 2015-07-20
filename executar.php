<?php

include 'conexao.php';

    switch ($_POST['enviar']) {
    
    case 'Retornou':
        $id = $_POST['id'];
        $odo_retorno = $_POST['odo_retorno'];
        
            try{
                $stmt = $pdo->prepare("UPDATE percursos SET odo_retorno=$odo_retorno, data_retorno=NOW(), hora_retorno=NOW() WHERE id_percurso=".$id); 
                $executa = $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();

            }

    header('Location: percurso') ;
    
    break;

    case 'Apagar':
        $id = $_POST['id'];
            
            try{
                    $stmt = $pdo->prepare("DELETE FROM percursos WHERE id_percurso=".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

    header('Location: percurso') ;
    
    break;

    case 'Cadastrar':
            $viatura = $_POST["viatura"];
            $motorista = $_POST["motorista"];
            $destino = $_POST["destino"];
            $odometro = $_POST["odo_saida"];
            $acompanhantes = $_POST["acompanhantes"];

            
            try{
                    $stmt = $pdo->prepare("INSERT INTO percursos VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL,NULL)"); 
                    $stmt->bindParam(1, $viatura , PDO::PARAM_STR);
                    $stmt->bindParam(2, $motorista , PDO::PARAM_STR);
                    $stmt->bindParam(3, $destino , PDO::PARAM_STR);
                    $stmt->bindParam(4, $odometro, PDO::PARAM_INT);
                    $stmt->bindParam(5, $acompanhantes, PDO::PARAM_STR);
                    $executa = $stmt->execute();

        if(!$executa){
               echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: percurso') ; 
    
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

        if(!$executa){
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

        
            try{
                    $stmt = $pdo->prepare("INSERT INTO motorista VALUES(NULL,?,?)"); 
                    $stmt->bindParam(1, $motorista , PDO::PARAM_STR);
                    $stmt->bindParam(2, $categoria , PDO::PARAM_STR);
                    $executa = $stmt->execute();

        if(!$executa){
              echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: /controle/motorista') ;
    
    break;
    
    
case 'Apagar Motorista':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM motorista WHERE id_motorista=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: motorista/index.php') ; 
   
   break;

case 'apagar_viatura':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM viaturas WHERE id_viatura=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: viatura/index.php') ; 
   
   break;

case 'atualizar_motorista':
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
   
	
	try{
		$stmt = $pdo->prepare("UPDATE motorista SET nome = ?, categoria = ? WHERE id_motorista = ?"); 
                $stmt->bindParam(1, $nome , PDO::PARAM_STR);
                $stmt->bindParam(2, $categoria , PDO::PARAM_STR);
                $stmt->bindParam(3, $id , PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: motorista/index.php') ; 
   
   break;

case 'atualizar_viatura':
    $id = $_POST['id'];
    $viatura = $_POST["viatura"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $odometro = $_POST["odometro"];
    $cap_tanque = $_POST["cap_tanque"];
    $cons_padrao = $_POST["cons_padrao"];
    $cap_transp = $_POST["cap_transp"];
    $situacao = $_POST["situacao"];
           
   
	
	try{
		$stmt = $pdo->prepare("UPDATE viaturas SET viatura = ?, modelo = ?, placa = ?, odometro = ?, cap_tanque = ?, consumo_padrao = ?, cap_transp = ?, situacao = ? WHERE id_viatura = ?"); 
                $stmt->bindParam(1, $viatura , PDO::PARAM_STR);
                $stmt->bindParam(2, $modelo , PDO::PARAM_STR);
                $stmt->bindParam(3, $placa , PDO::PARAM_STR);
                $stmt->bindParam(4, $odometro, PDO::PARAM_INT);
                $stmt->bindParam(5, $cap_tanque, PDO::PARAM_INT);
                $stmt->bindParam(6, $cons_padrao, PDO::PARAM_INT);
                $stmt->bindParam(7, $cap_transp, PDO::PARAM_INT);
                $stmt->bindParam(8, $situacao, PDO::PARAM_STR);
                $stmt->bindParam(9, $id, PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: viatura/index.php') ; 
   
   break;

case 'apagar_usuario':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM usuario WHERE id_usuario=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: usuario/cadastrar_usuario.php') ; 
   
   break;

case 'atualizar_usuario':
    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
   
	
	try{
		$stmt = $pdo->prepare("UPDATE usuario SET login = ?, senha = ? WHERE id_usuario = ?"); 
                $stmt->bindParam(1, $login , PDO::PARAM_STR);
                $stmt->bindParam(2, $senha , PDO::PARAM_STR);
                $stmt->bindParam(3, $id , PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: usuario/cadastrar_usuario.php') ; 
   
   break;

    default:
       //no action sent
    }
?>
