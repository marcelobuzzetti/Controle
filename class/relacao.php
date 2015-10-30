<?php
class Motorista{ 
    public function listarMotoristas(){
        include '../configs/conexao.php';
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
    
    public function listarMotoristasCadastrados(){
        include '../configs/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_motorista, nome, habilitacoes.categoria AS categoria, sigla
                                                FROM motoristas, habilitacoes, posto_grad
                                                WHERE motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_posto_grad = posto_grad.id_posto_grad");
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

class Combustivel{ 
    public function listarCombustiveisAbastecimento(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT combustiveis.id_combustivel AS id_comb, descricao
                                                    FROM combustiveis, recibos_combustiveis
                                                    WHERE combustiveis.id_combustivel IN (SELECT recibos_combustiveis.id_combustivel
                                                                                                                  FROM recibos_combustiveis)");
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
    
    public function listarCombustiveis(){
        include '../configs/conexao.php';
         try {
                    $stmt = $pdo->prepare("SELECT * FROM combustiveis;");
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


class TipoCombustivel{ 
    
public function listarTiposCombustiveis(){
        include '../configs/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT * FROM tipos_combustiveis");
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

public function listarTiposCombustiveisAbastecimento(){
        include '../configs/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT tipos_combustiveis.id_tipo_combustivel AS id_tipo, descricao 
                                                    FROM tipos_combustiveis, recibos_combustiveis
                                                    WHERE tipos_combustiveis.id_tipo_combustivel IN (SELECT recibos_combustiveis.id_tipo_combustivel            
                                                                                                                                  FROM recibos_combustiveis)");
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

class Abastecimento{ 
    public function listarAbastecimentos(){
        include '../configs/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT id_abastecimento, nrvale,  motoristas.apelido AS apelido, marcas.descricao AS marca, modelos.descricao AS modelo, viaturas.placa AS placa, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, data
                                                    FROM abastecimentos, marcas, modelos, viaturas, motoristas, combustiveis, tipos_combustiveis
                                                    WHERE abastecimentos.id_motorista = motoristas.id_motorista
                                                    AND abastecimentos.id_viatura = viaturas.id_viatura
                                                    AND abastecimentos.id_combustivel = combustiveis.id_combustivel
                                                    AND abastecimentos.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND viaturas.id_marca = marcas.id_marca;");
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

class Marca{ 
    public function listarMarcas(){
        include '../configs/conexao.php';
          try{
        $stmt = $pdo->prepare("SELECT * FROM marcas;");
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

class Habilitacao{ 
    public function listarHabilitacoes(){
        include '../configs/conexao.php';
          try {
            $stmt = $pdo->prepare("SELECT * FROM habilitacoes");
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

class Modelo{ 
    public function listarModelos(){
        include '../configs/conexao.php';
         try {
            $stmt = $pdo->prepare("SELECT id_modelo, marcas.descricao AS marca, modelos.descricao AS descricao, cap_tanque, consumo_padrao, cap_transp, habilitacoes.categoria AS habilitacao
                                               FROM modelos, habilitacoes, marcas
                                               WHERE modelos.id_habilitacao = habilitacoes.id_habilitacao
                                               AND modelos.id_marca = marcas.id_marca;");
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

class PostoGrad{ 
    public function listarPostoGrad(){
        include '../configs/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM posto_grad");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo 'Erro ao inserir os dados';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        }
}

class Percurso{
    public function listarPercursosFechadas(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                                    FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                    WHERE data_retorno IS NOT NULL 
                                                    AND percursos.id_motorista = motoristas.id_motorista
                                                    AND percursos.id_viatura = viaturas.id_viatura
                                                    AND viaturas.id_marca = marcas.id_marca
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND percursos.id_destino = destinos.id_destino
                                                    AND data_retorno BETWEEN (SELECT DATE_SUB(date(now()), INTERVAL 7 DAY)) AND  (SELECT DATE(NOW()))
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
    
}

class RecebimentoCombustivel{
    public function listarRecebimentoCombustiveis(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT id_recibo_combustivel,combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo,qnt, motivo, data, hora
                                                    FROM tipos_combustiveis,combustiveis,recibos_combustiveis
                                                    WHERE recibos_combustiveis.id_combustivel =combustiveis.id_combustivel
                                                    AND recibos_combustiveis.id_tipo_combustivel =tipos_combustiveis.id_tipo_combustivel; ");
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

class Relatorio{
    public function listarPercursos($inicio,$fim){
        include '../configs/conexao.php';
          try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                                        FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                        WHERE data_saida BETWEEN ? AND ?
                                                        AND percursos.id_motorista = motoristas.id_motorista
                                                        AND percursos.id_viatura = viaturas.id_viatura
                                                        AND viaturas.id_marca = marcas.id_marca
                                                        AND viaturas.id_modelo = modelos.id_modelo ");
            $stmt->bindParam(1, $inicio, PDO::PARAM_STR);
            $stmt->bindParam(2, $fim, PDO::PARAM_STR);
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
?>
