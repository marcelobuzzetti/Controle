<?php

class Viatura{ 
    public function listarViaturas(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                                    FROM viaturas, marcas, modelos
                                                    WHERE viaturas.id_marca = marcas.id_marca AND
                                                    viaturas.id_modelo = modelos.id_modelo");
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
    
    public function listarViaturasCadastradas(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_viatura, marcas.descricao AS marca, modelos.descricao AS modelo, placa, odometro, modelos.cap_tanque, modelos.consumo_padrao, modelos.cap_transp, habilitacoes.categoria, situacao.disponibilidade
                                                    FROM viaturas, marcas, modelos, habilitacoes, situacao
                                                    WHERE modelos.id_habilitacao = habilitacoes.id_habilitacao
                                                    AND viaturas.id_situacao = situacao.id_situacao ");
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
    
    public function listarViaturasPercursos(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                                        FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                        WHERE data_retorno IS NULL 
                                                        AND percursos.id_motorista = motoristas.id_motorista
                                                        AND percursos.id_viatura = viaturas.id_viatura
                                                        AND viaturas.id_marca = marcas.id_marca
                                                        AND viaturas.id_modelo = modelos.id_modelo
                                                        AND percursos.id_destino = destinos.id_destino
                                                        ORDER BY id_percurso DESC");
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
            
            public function listarViaturasPercursosDisponiveis(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                                    FROM viaturas, marcas, modelos
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo 
                                                    AND id_viatura NOT IN (SELECT id_viatura 
                                                                                          FROM percursos 
                                                                                          WHERE data_retorno IS NULL)
                                                    AND id_situacao != 2
                                                    ORDER BY marcas.descricao AND modelos.descricao");
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
