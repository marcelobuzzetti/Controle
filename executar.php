<?php
$endereco = $_SERVER['SERVERNAME'].'/controle';
include 'conexao.php';

    switch ($_POST['enviar']) {
    
    case 'Retornou':
        $id = $_POST['id'];
        $odo_retorno = $_POST['odo_retorno'];
        
            try{
                $stmt = $pdo->prepare("UPDATE percursos "
                        . "                        SET odo_retorno=$odo_retorno, data_retorno=NOW(), hora_retorno=NOW() "
                        . "                        WHERE id_percurso=".$id); 
                $executa = $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();

            }

    header('Location: '.$endereco.'/percurso') ;
    
    break;

    case 'Apagar':
        $id = $_POST['id'];
            
            try{
                    $stmt = $pdo->prepare("DELETE FROM percursos "
                            . "                        WHERE id_percurso=".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

    header('Location: '.$endereco.'/percurso') ;
    
    break;

    case 'Cadastrar':
            $viatura = $_POST["viatura"];
            $nome = $_POST["motorista"];
            $destino = strtoupper($_POST["destino"]);
            $odometro = $_POST["odo_saida"];
            $ch_vtr = strtoupper($_POST["ch_vtr"]);

            
            try{
                    $stmt = $pdo->prepare("INSERT INTO percursos "
                            . "                        VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL,NULL)"); 
                    $stmt->bindParam(1, $viatura , PDO::PARAM_INT);
                    $stmt->bindParam(2, $nome, PDO::PARAM_INT);
                    $stmt->bindParam(3, $destino , PDO::PARAM_INT);
                    $stmt->bindParam(4, $odometro, PDO::PARAM_INT);
                    $stmt->bindParam(5, $ch_vtr, PDO::PARAM_INT);
                    $executa = $stmt->execute();

        if(!$executa){
               echo "Erro ao inserir os dados";
               //Inserido para criar o erro de inserção
               session_start();
               $_SESSION['mysql'] = 1;
               //Inserido para criar o erro de inserção
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: '.$endereco.'/percurso') ;
    
    break;

    case 'viatura':
            $viatura = strtoupper($_POST["viatura"]);
            $modelo = strtoupper($_POST["modelo"]);
            $placa = strtoupper($_POST["placa"]);
            $odometro = $_POST["odometro"];
            $cap_tanque = $_POST["cap_tanque"];
            $cons_padrao = $_POST["cons_padrao"];
            $cap_transp = $_POST["cap_transp"];
            $habilitacao = $_POST["habilitacao"];
            $situacao = $_POST["situacao"];
           

            
            try{
                    $stmt = $pdo->prepare("INSERT INTO viaturas "
                            . "                        VALUES(NULL,?,?,?,?,?,?,?,?,?)"); 
                    $stmt->bindParam(1, $viatura , PDO::PARAM_STR);
                    $stmt->bindParam(2, $modelo , PDO::PARAM_STR);
                    $stmt->bindParam(3, $placa , PDO::PARAM_STR);
                    $stmt->bindParam(4, $odometro, PDO::PARAM_INT);
                    $stmt->bindParam(5, $cap_tanque, PDO::PARAM_INT);
                    $stmt->bindParam(6, $cons_padrao, PDO::PARAM_INT);
                    $stmt->bindParam(7, $cap_transp, PDO::PARAM_INT);
                    $stmt->bindParam(8, $situacao, PDO::PARAM_INT);
                    $stmt->bindParam(9, $habilitacao, PDO::PARAM_INT);
                    $executa = $stmt->execute();

        if(!$executa){
            echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

    header('Location: '.$endereco.'/viatura') ;
    
    break;

    case 'motorista':
        $nome = strtoupper($_POST['nome']);
        $categoria = $_POST['categoria'];
        $pg = $_POST['pg'];
        

        
            try{
                
                $stmt = $pdo->prepare("SELECT sigla FROM posto_grad WHERE id_posto_grad = ?"); 
                $stmt->bindParam(1, $pg , PDO::PARAM_INT);
                $executa = $stmt->execute();
                $sigla = $stmt->fetch();
                $apelido = $sigla[0]." ".$nome;
                
                $stmt = $pdo->prepare("INSERT INTO motoristas "
                            . "                        VALUES(NULL,?,?,?,?)"); 
                    $stmt->bindParam(1, $nome , PDO::PARAM_STR);
                    $stmt->bindParam(2, $categoria , PDO::PARAM_INT);
                    $stmt->bindParam(3, $pg , PDO::PARAM_INT);
                    $stmt->bindParam(4, $apelido , PDO::PARAM_STR);
                    $executa = $stmt->execute();

        if(!$executa){
              echo "Erro ao inserir os dados";
           }
       }catch(PDOException $e){
                    echo $e->getMessage();
       }

   header('Location: '.$endereco.'/motorista') ;
    
    break;
    
    
case 'Apagar Motorista':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM motoristas "
                        . "                                               WHERE id_motorista=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/motorista') ; 
   
   break;

case 'apagar_viatura':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM viaturas "
                        . "                                               WHERE id_viatura=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/viatura') ; 
   
   break;

case 'atualizar_motorista':
    $id = $_POST['id'];
    $nome = strtoupper($_POST['nome']);
    $categoria = $_POST['categoria'];
    $pg = $_POST['pg'];
   
	
	try{
            
                $stmt = $pdo->prepare("SELECT sigla FROM posto_grad WHERE id_posto_grad = ?"); 
                $stmt->bindParam(1, $pg , PDO::PARAM_INT);
                $executa = $stmt->execute();
                $sigla = $stmt->fetch();
                $apelido = $sigla[0]." ".$nome;
                
                $stmt = $pdo->prepare("UPDATE motoristas "
                        . "                                               SET nome = ?, categoria = ?, posto_grad = ?, apelido = ? "
                        . "                                               WHERE id_motorista = ?"); 
                $stmt->bindParam(1, $nome , PDO::PARAM_STR);
                $stmt->bindParam(2, $categoria , PDO::PARAM_INT);
                $stmt->bindParam(3, $pg , PDO::PARAM_INT);
                $stmt->bindParam(4, $apelido , PDO::PARAM_STR);
                $stmt->bindParam(5, $id , PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: '.$endereco.'/motorista') ; 
   
   break;

case 'atualizar_viatura':
    $id = $_POST['id'];
    $viatura = strtoupper($_POST["viatura"]);
    $modelo = strtoupper($_POST["modelo"]);
    $placa = strtoupper($_POST["placa"]);
    $odometro = $_POST["odometro"];
    $cap_tanque = $_POST["cap_tanque"];
    $cons_padrao = $_POST["cons_padrao"];
    $cap_transp = $_POST["cap_transp"];
    $habilitacao = $_POST['habilitacao'];
    $situacao = $_POST["situacao"];
           
   
	
	try{
		$stmt = $pdo->prepare("UPDATE viaturas "
                        . "                                               SET viatura = ?, modelo = ?, placa = ?, odometro = ?, cap_tanque = ?, consumo_padrao = ?, cap_transp = ?, habilitacao = ?, situacao = ? "
                        . "                                               WHERE id_viatura = ?"); 
                $stmt->bindParam(1, $viatura , PDO::PARAM_STR);
                $stmt->bindParam(2, $modelo , PDO::PARAM_STR);
                $stmt->bindParam(3, $placa , PDO::PARAM_STR);
                $stmt->bindParam(4, $odometro, PDO::PARAM_INT);
                $stmt->bindParam(5, $cap_tanque, PDO::PARAM_INT);
                $stmt->bindParam(6, $cons_padrao, PDO::PARAM_INT);
                $stmt->bindParam(7, $cap_transp, PDO::PARAM_INT);
                $stmt->bindParam(8, $habilitacao, PDO::PARAM_INT);
                $stmt->bindParam(9, $situacao, PDO::PARAM_INT);
                $stmt->bindParam(10, $id, PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: '.$endereco.'/viatura') ; 
   
   break;

case 'apagar_usuario':
    $id = $_POST['id'];
	
	try{
		$stmt = $pdo->prepare("DELETE FROM usuarios "
                        . "                                               WHERE id_usuario=".$id); 
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
    header('Location: '.$endereco.'/usuario/cadastrar_usuario.php') ; 
   
   break;

case 'atualizar_usuario':
    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['perfil'];
    $apelido = strtoupper($_POST['apelido']);
     
	
	try{
                $stmt = $pdo->prepare("UPDATE usuarios "
                        . "                        SET login = ?, senha = ?, perfil = ?, nome = ? "
                        . "                        WHERE id_usuario = ?"); 
                $stmt->bindParam(1, $login , PDO::PARAM_STR);
                $stmt->bindParam(2, $senha , PDO::PARAM_STR);
                $stmt->bindParam(3, $perfil , PDO::PARAM_INT);
                $stmt->bindParam(4, $apelido , PDO::PARAM_STR);
                $stmt->bindParam(5, $id , PDO::PARAM_INT);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/usuario/cadastrar_usuario.php') ; 
   
   break;

    default:
       //no action sent
    }
?>
