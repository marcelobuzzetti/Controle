<?php

class Relatorio {

    public function listarPercursos($inicio, $fim) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, acompanhante, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
                                                        FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                        WHERE data_saida BETWEEN ? AND ?
                                                        AND percursos.id_motorista = motoristas.id_motorista
                                                        AND percursos.id_viatura = viaturas.id_viatura
                                                        AND viaturas.id_marca = marcas.id_marca
                                                        AND viaturas.id_modelo = modelos.id_modelo 
                                                        AND percursos.id_destino = destinos.id_destino");
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
    
     public function listarPercursosCompleto() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, acompanhante, DATE_FORMAT(data_saida,'%d/%m/%Y') AS data_saida, hora_saida, odo_retorno, DATE_FORMAT(data_retorno,'%d/%m/%Y') AS data_retorno, hora_retorno
                                                FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                WHERE percursos.id_motorista = motoristas.id_motorista
                                                AND percursos.id_viatura = viaturas.id_viatura
                                                AND viaturas.id_marca = marcas.id_marca
                                                AND viaturas.id_modelo = modelos.id_modelo 
                                                AND percursos.id_destino = destinos.id_destino
                                                ORDER BY data_saida, hora_saida");
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

    public function listarVtrUtilizacao($inicio, $fim) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT count(id_percurso) AS qnt, IFNULL((MAX(p.odo_retorno) - MIN(p.odo_saida)),0) AS KM, m.descricao AS marca, mo.descricao AS modelo, placa
                                                FROM percursos p
                                                RIGHT JOIN viaturas v ON p.id_viatura = v.id_viatura AND p.data_saida BETWEEN ? AND ?
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                GROUP BY v.id_viatura
                                                ORDER BY v.id_viatura");
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
    
    public function listarVtrUtilizacaoCompleto() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT count(id_percurso) AS qnt, IFNULL((MAX(p.odo_retorno) - MIN(p.odo_saida)),0) AS KM, m.descricao AS marca, mo.descricao AS modelo, placa
                                                FROM percursos p
                                                RIGHT JOIN viaturas v ON p.id_viatura = v.id_viatura
                                                INNER JOIN marcas m ON m.id_marca = v.id_marca
                                                INNER JOIN modelos mo ON mo.id_modelo = v.id_modelo
                                                GROUP BY v.id_viatura
                                                ORDER BY v.id_viatura");
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
    
     public function listarMotoristaUtilizacao($inicio, $fim) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT count(id_percurso) AS qnt, IFNULL((SUM(p.odo_retorno) - SUM(p.odo_saida)),0) AS KM, apelido
                                                FROM percursos p
                                                RIGHT JOIN motoristas m ON p.id_motorista = m.id_motorista  
                                                AND p.data_saida BETWEEN ? AND ?                                             
                                                AND p.odo_retorno > 0
                                                GROUP BY m.id_motorista
                                                ORDER BY m.id_motorista");
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
    
     public function listarMotoristaCompleto() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT count(id_percurso) AS qnt, IFNULL((SUM(p.odo_retorno) - SUM(p.odo_saida)),0) AS KM, apelido
                                                FROM percursos p
                                                RIGHT JOIN motoristas m ON p.id_motorista = m.id_motorista   
                                                WHERE p.odo_retorno > 0
                                                GROUP BY m.id_motorista
                                                ORDER BY m.id_motorista");
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
