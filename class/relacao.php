<?php
class Motorista{ 
    public function listarMotoristas(){
        include '../configs/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_motorista, apelido
                                                FROM motoristas");
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
}

class Combustiveis{ 
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


class TiposCombustiveis{ 
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

class Abastecimentos{ 
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

class Marcas{ 
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

class Habilitacoes{ 
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

class Modelos{ 
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
?>
