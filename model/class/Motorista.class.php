<?php
class Motorista{ 
    public function listarMotoristas(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas WHERE id_status != 2 AND 
                                                                                            id_motorista NOT IN (SELECT id_motorista
                                                                                                                             FROM percursos 
                                                                                                                             WHERE data_retorno IS NULL)");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }   
    
    public function listarMotoristasCadastrados(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT  motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar,sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao, apelido
                                                FROM militares, posto_grad, 
                                                status , motoristas, habilitacoes
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_militar = motoristas.id_militar
                                                AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_status = 1");       
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }
    
    public function listarMotoristasInativos(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT  motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar,sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao
                                                FROM militares, posto_grad, 
                                                status , motoristas, habilitacoes
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_militar = motoristas.id_militar
                                                AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_status = 2");       
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }
    
      public function listarMotoristasAtualizar($id){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar, sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao
                                                FROM militares, posto_grad, 
                                                status , motoristas, habilitacoes
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_militar = motoristas.id_militar
                                                AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND id_motorista = $id");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }
    
      public function listarMotoristasCompleto(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }   
    
    public function listarMotorista($id){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT  motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar,sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao, apelido
                                                FROM militares, posto_grad, 
                                                status , motoristas, habilitacoes
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_militar = motoristas.id_militar
                                                AND motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_motorista = $id");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                } else {
                    print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
    }
    
         public function listarPercursos($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
                                                FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                WHERE percursos.id_motorista = motoristas.id_motorista
                                                AND percursos.id_viatura = viaturas.id_viatura
                                                AND viaturas.id_marca = marcas.id_marca
                                                AND viaturas.id_modelo = modelos.id_modelo 
                                                AND percursos.id_destino = destinos.id_destino
                                                AND percursos.id_motorista = $id
                                                ORDER BY data_saida DESC, hora_saida DESC");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                           alert('Não foi possível criar tabela.');
                           </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
