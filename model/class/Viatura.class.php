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
            $stmt = $pdo->prepare("SELECT v.id_viatura, m.descricao AS marca, mo.descricao AS modelo, placa, IFNULL( GREATEST( MAX( p.odo_retorno ) , MAX( p.odo_saida ) ) , v.odometro ) AS odometro, mo.cap_tanque, mo.consumo_padrao, mo.cap_transp, ha.categoria, s.disponibilidade, v.ano
                                                FROM percursos p
                                                RIGHT JOIN viaturas v ON p.id_viatura = v.id_viatura AND v.id_status != 2
                                                AND p.data_saida
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                INNER JOIN habilitacoes ha ON ha.id_habilitacao = v.id_habilitacao
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
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, IFNULL(acompanhante,'-') AS acompanhante, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
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

    public function ViaturasRodando() {
        include './model/conexao.php';
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

}
