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
                    $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
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
                    $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
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
                        . "                                               WHERE id_motorista= ?"); 
                 $stmt->bindParam(1, $id , PDO::PARAM_INT);
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
                $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
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

    case 'tipocomb':
    $descricao= strtoupper($_POST['descricao']);
       
	
	try{
                $stmt = $pdo->prepare("INSERT INTO tipo_comb     "
                            . "                        VALUES(NULL,?)"); 
                $stmt->bindParam(1, $descricao , PDO::PARAM_STR);
		$executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/tipo_comb/') ; 
   
   break;

    case 'apagar_tipocomb':
        $id = $_POST['id'];

            try{
                    $stmt = $pdo->prepare("DELETE FROM tipo_comb "
                            . "                                               WHERE tp_comb_id=".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

        header('Location: '.$endereco.'/tipo_comb') ; 

       break;

    case 'atualizar_tipocomb':
        $id = $_POST['id'];
        $descricao = strtoupper($_POST['descricao']);

            try{
                    $stmt = $pdo->prepare("UPDATE tipo_comb"
                            . "                        SET tp_comb_desc = ? WHERE tp_comb_id = ?"); 
                    $stmt->bindParam(1, $descricao , PDO::PARAM_STR);
                    $stmt->bindParam(2, $id , PDO::PARAM_INT);
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

       header('Location: '.$endereco.'/tipo_comb') ; 

       break;
   
case 'tipo':
    $descricao= strtoupper($_POST['descricao']);
       
	
	try{
                $stmt = $pdo->prepare("INSERT INTO tipo     "
                            . "                        VALUES(NULL,?)"); 
                $stmt->bindParam(1, $descricao , PDO::PARAM_STR);
                $executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/tipo/') ; 
   
   break;

    case 'apagar_tipo':
        $id = $_POST['id'];

            try{
                    $stmt = $pdo->prepare("DELETE FROM tipo "
                            . "                                               WHERE tp_id=".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

        header('Location: '.$endereco.'/tipo') ; 

       break;

    case 'atualizar_tipo':
        $id = $_POST['id'];
        $descricao = strtoupper($_POST['descricao']);

            try{
                    $stmt = $pdo->prepare("UPDATE tipo"
                            . "                        SET tp_desc = ? WHERE tp_id = ?"); 
                    $stmt->bindParam(1, $descricao , PDO::PARAM_STR);
                    $stmt->bindParam(2, $id , PDO::PARAM_INT);
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

       header('Location: '.$endereco.'/tipo') ; 
       
       break;
       
       case 'rcb_comb':
           $tp_comb = $_POST['tp_comb'];
           $tp = $_POST['tp'];
           $qnt = $_POST['qnt'];
           $motivo = strtoupper($_POST['motivo']);
              
	
	try{
                $stmt = $pdo->prepare("INSERT INTO rcb_comb     "
                            . "                        VALUES(NULL,?,?,?,?,NOW(),NOW())"); 
                $stmt->bindParam(1, $tp_comb , PDO::PARAM_INT);
                $stmt->bindParam(2, $tp , PDO::PARAM_INT);
                $stmt->bindParam(3, $qnt , PDO::PARAM_INT);
                $stmt->bindParam(4, $motivo , PDO::PARAM_STR);
                $executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/rcb_comb/') ; 
   
   break;

    case 'apagar_rcb_comb':
        $id = $_POST['id'];
       
            try{
                    $stmt = $pdo->prepare("DELETE FROM rcb_comb "
                            . "                                               WHERE rcb_id =".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

        header('Location: '.$endereco.'/rcb_comb') ; 

       break;

        case 'atualizar_rcb_comb':
            $id = $_POST['id'];
            $tp_comb = $_POST['tp_comb'];
            $tp = $_POST['tp'];
            $qnt = $_POST['qnt'];
            $motivo = strtoupper($_POST['motivo']);

                try{
                        $stmt = $pdo->prepare("UPDATE rcb_comb"
                            . "                        SET rcb_tp_comb = ?, rcb_tp =?, rcb_qnt = ?, rcb_motivo = ?, rcb_data = NOW(), rcb_hora = NOW() WHERE rcb_id =".$id); 
                        $stmt->bindParam(1, $tp_comb, PDO::PARAM_INT);
                        $stmt->bindParam(2, $tp , PDO::PARAM_INT);
                        $stmt->bindParam(3, $qnt , PDO::PARAM_INT);
                        $stmt->bindParam(4, $motivo , PDO::PARAM_STR);
                        $executa = $stmt->execute();
                }catch(PDOException $e){
                        echo $e->getMessage();
                }

           header('Location: '.$endereco.'/rcb_comb') ; 

           break;

       case 'abst':
           $nrvale = $_POST['nrvale'];
           $motorista = $_POST['motorista'];
           $viatura = $_POST['viatura'];
           $tp_comb = $_POST['tp_comb'];
           $tp = $_POST['tp'];
           $qnt = $_POST['qnt'];
              
	
	try{
                $stmt = $pdo->prepare("INSERT INTO abastecimentos     "
                            . "                    VALUES(NULL,?,?,?,?,?,?,NOW(),NOW())"); 
                $stmt->bindParam(1, $nrvale , PDO::PARAM_STR);
                $stmt->bindParam(2, $motorista , PDO::PARAM_INT);
                $stmt->bindParam(3, $viatura , PDO::PARAM_INT);
                $stmt->bindParam(4, $tp_comb , PDO::PARAM_INT);
                $stmt->bindParam(5, $tp , PDO::PARAM_INT);
                $stmt->bindParam(6, $qnt , PDO::PARAM_INT);
                $executa = $stmt->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
	}
   
   header('Location: '.$endereco.'/abastecimento/') ; 
   
   break;

    case 'apagar_abst':
        $id = $_POST['id'];
       
            try{
                    $stmt = $pdo->prepare("DELETE FROM abastecimentos "
                            . "                                               WHERE abast_id =".$id); 
                    $executa = $stmt->execute();
            }catch(PDOException $e){
                    echo $e->getMessage();
            }

        header('Location: '.$endereco.'/abastecimento') ; 

       break;

        case 'atualizar_abst':
            $id = $_POST['id'];
            $nrvale = $_POST['nrvale'];
            $motorista = $_POST['motorista'];
            $viatura = $_POST['viatura'];
            $tp_comb = $_POST['tp_comb'];
            $tp = $_POST['tp'];
            $qnt = $_POST['qnt'];

                try{
                        $stmt = $pdo->prepare("UPDATE abastecimentos"
                            . "                        SET abast_nrvale = ?, abast_motorista =?, abast_vtr = ?, abast_tipo_comb = ?, abast_tipo = ?, abast_qnt = ?, abast_hora = NOW(), abast_data = NOW() WHERE abast_id =".$id); 
                        $stmt->bindParam(1, $nrvale, PDO::PARAM_STR);
                        $stmt->bindParam(2, $motorista , PDO::PARAM_INT);
                        $stmt->bindParam(3, $viatura , PDO::PARAM_INT);
                        $stmt->bindParam(4, $tp_comb , PDO::PARAM_INT);
                        $stmt->bindParam(5, $tp , PDO::PARAM_INT);
                        $stmt->bindParam(6, $qnt , PDO::PARAM_INT);
                        $executa = $stmt->execute();
                }catch(PDOException $e){
                        echo $e->getMessage();
                }

           header('Location: '.$endereco.'/abastecimento') ; 

           break;
       
    default:
       //no action sent
    }
?>
