<?php

class Viatura {

    public function listarViaturas() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                                    FROM viaturas, marcas, modelos
                                                    WHERE viaturas.id_marca = marcas.id_marca AND
                                                    viaturas.id_modelo = modelos.id_modelo
                                                    AND viaturas.id_status != 2");
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

    public function listarViaturasCadastradas() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT v.id_viatura, m.descricao AS marca, mo.descricao AS modelo, placa, v.rfid, tp.descricao AS tipo_viatura , IFNULL( GREATEST( MAX( p.odo_retorno ) , MAX( p.odo_saida ) ) , v.odometro ) AS odometro, mo.cap_tanque, mo.consumo_padrao, mo.cap_transp, ha.categoria, s.disponibilidade, v.ano
                                                FROM percursos p
                                                RIGHT JOIN viaturas v ON p.id_viatura = v.id_viatura                                                
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca AND v.id_status = 1
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                INNER JOIN habilitacoes ha ON ha.id_habilitacao = v.id_habilitacao
                                                INNER JOIN tipos_viaturas tp ON tp.id_tipo_viatura = v.id_tipo_viatura
                                                INNER JOIN situacao s ON s.id_situacao = v.id_situacao
                                                GROUP BY v.id_viatura
                                                ORDER BY v.id_viatura");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                         alert('Não foi possível criar tabela de viaturas cadastradas.');
                         </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listarViaturasPercursos() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, viaturas.id_viatura, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acomapnhantes') AS acompanhante, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
                                                        FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                        WHERE data_retorno IS NULL 
                                                        AND percursos.id_motorista = motoristas.id_motorista
                                                        AND percursos.id_viatura = viaturas.id_viatura
                                                        AND viaturas.id_marca = marcas.id_marca
                                                        AND viaturas.id_modelo = modelos.id_modelo
                                                        AND percursos.id_destino = destinos.id_destino
                                                        AND viaturas.id_status != 2
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

    public function listarViaturasPercursosDisponiveis() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                                    FROM viaturas, marcas, modelos
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo 
                                                    AND id_viatura NOT IN (SELECT id_viatura 
                                                                                          FROM percursos 
                                                                                          WHERE data_retorno IS NULL)
                                                    AND id_situacao != 2
                                                    AND viaturas.id_status != 2
                                                    ORDER BY marcas.descricao, modelos.descricao");
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

    public function ViaturasRodando() {
        include './model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante,  DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno,  DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
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
                              alert('Não foi possível criar tabela de Viaturas Rodando.');
                              </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function ViaturasRodandoRelatorio() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido AS apelido, nome_destino, odo_saida, acompanhante,  DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno,  DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
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
                              alert('Não foi possível criar tabela de Viaturas Rodando.');
                              </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function detalharViatura($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT v.id_viatura, m.descricao AS marca, mo.descricao AS modelo, placa, tp.descricao AS tipo_viatura, IFNULL( GREATEST( MAX( p.odo_retorno ) , MAX( p.odo_saida ) ) , v.odometro ) AS odometro, mo.cap_tanque, mo.consumo_padrao, mo.cap_transp, ha.categoria, s.disponibilidade, v.ano
                                                FROM percursos p
                                                INNER JOIN viaturas v ON p.id_viatura = v.id_viatura AND v.id_viatura = $id
                                                AND p.data_saida
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                INNER JOIN habilitacoes ha ON ha.id_habilitacao = v.id_habilitacao
                                                INNER JOIN tipos_viaturas tp ON tp.id_tipo_viatura = v.id_tipo_viatura
                                                INNER JOIN situacao s ON s.id_situacao = v.id_situacao
                                                ORDER BY v.id_viatura");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                         alert('Não foi possível criar tabela de viaturas cadastradas.');
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
                                                AND percursos.id_viatura = $id
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

    public function listarMotorista($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT motoristas.apelido AS apelido, odo_saida, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno, IFNULL(odo_retorno - odo_saida,0) AS KM, nome_destino
                                                FROM percursos, motoristas, destinos
                                                WHERE percursos.id_motorista = motoristas.id_motorista
                                                AND percursos.id_destino = destinos.id_destino
                                                AND percursos.id_viatura = $id
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
                                                AND acidentes_viaturas.id_situacao = situacao.id_situacao
                                                AND acidentes_viaturas.id_viatura  = $id
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

    public function listarMnt($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_manutencao_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,manutencao_viaturas.odometro, manutencao_viaturas.descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                                    FROM viaturas, marcas, modelos, manutencao_viaturas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND manutencao_viaturas.id_viatura = viaturas.id_viatura
                                                    AND manutencao_viaturas.id_viatura = $id
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

    public function listarAbastecimentos($id) {
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
                                                    AND abastecimentos.id_viatura  = $id
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

    public function listarAlteracaoVtr($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_alteracao_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,alteracao_viaturas.odometro AS odometro, alteracao_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                                    FROM viaturas, marcas, modelos, alteracao_viaturas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND alteracao_viaturas.id_viatura = viaturas.id_viatura
                                                    AND alteracao_viaturas.id_viatura = $id");
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

    public function quantidadeVtrMarcaModelo() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT v.id_viatura, COUNT(v.id_viatura) AS qnt, m.descricao AS marca, mo.descricao AS modelo
                                                FROM viaturas v
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca AND v.id_status = 1
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                GROUP BY marca, modelo
                                                ORDER BY marca, modelo");
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

    public function listarVtrIndisponiveis() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT v.id_viatura, COUNT(v.id_viatura) AS qnt, COUNT(v.id_situacao) AS qnt_disponibilidade, s.disponibilidade AS descricao, m.descricao AS marca, mo.descricao AS modelo
                                                FROM viaturas v
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca AND v.id_status = 1 AND v.id_situacao = 2
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                INNER JOIN situacao s ON s.id_situacao = v.id_situacao
                                                GROUP BY marca, modelo, v.id_situacao
                                                ORDER BY marca, modelo");
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

}
