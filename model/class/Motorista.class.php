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
            $stmt = $pdo->prepare("SELECT  motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar,sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao, apelido, cnh
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
            $stmt = $pdo->prepare("SELECT  motoristas.id_motorista AS id_motorista, motoristas.id_militar AS id_militar,sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status, motoristas.id_habilitacao AS id_habilitacao, apelido, cnh
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
    
     public function listarViatura($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT CONCAT(marcas.descricao,'-',modelos.descricao,'-',placa) AS viatura, odo_saida, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno, IFNULL(odo_retorno - odo_saida,0) AS KM, nome_destino
                                                FROM percursos, motoristas, destinos, marcas, modelos, viaturas
                                                WHERE percursos.id_viatura = viaturas.id_viatura
                                                AND percursos.id_destino = destinos.id_destino
                                                AND percursos.id_viatura = viaturas.id_viatura
                                                AND viaturas.id_marca = marcas.id_marca
                                                AND viaturas.id_modelo = modelos.id_modelo
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
    
     public function listarAcidente($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_acidente_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa, IFNULL(acompanhante,'Sem Acompanhante') AS acompanhante, motoristas.apelido AS motorista, acidentes_viaturas.odometro AS odometro, acidentes_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data, avarias, disponibilidade
                                                FROM viaturas, marcas, modelos, acidentes_viaturas, motoristas, situacao
                                                WHERE viaturas.id_marca = marcas.id_marca 
                                                AND viaturas.id_modelo = modelos.id_modelo
                                                AND motoristas.id_motorista = acidentes_viaturas.id_motorista
                                                AND acidentes_viaturas.id_viatura = viaturas.id_viatura
                                                AND situacao.id_situacao = acidentes_viaturas.id_situacao
                                                AND acidentes_viaturas.id_motorista  = $id
                                                ORDER BY data");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                         alert('Não foi possível criar tabela viaturas.');
                         </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function listarAbastecimentos($id){
        include '../model/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT id_abastecimento, nrvale,  motoristas.apelido AS apelido, marcas.descricao AS marca, modelos.descricao AS modelo, viaturas.placa AS placa, abastecimentos.odometro AS odometro, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                                    FROM abastecimentos, marcas, modelos, viaturas, motoristas, combustiveis, tipos_combustiveis
                                                    WHERE abastecimentos.id_motorista = motoristas.id_motorista
                                                    AND abastecimentos.id_viatura = viaturas.id_viatura
                                                    AND abastecimentos.id_combustivel = combustiveis.id_combustivel
                                                    AND abastecimentos.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND viaturas.id_marca = marcas.id_marca
                                                    AND abastecimentos.id_motorista  = $id
                                                    ORDER BY data DESC");
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
    
    public function listarKm($id){
        include '../model/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT SUM(odo_retorno - odo_saida) as KM "
                        . "                         FROM percursos"
                        . "                         WHERE id_motorista = $id");
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
