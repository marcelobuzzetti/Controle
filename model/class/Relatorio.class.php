<?php

class Relatorio {

    public function listarPercursos($inicio, $fim) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS modelo, placa, motoristas.apelido AS apelido, destinos.nome_destino AS destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
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

    public function listarVtrUtilizacao($inicio, $fim) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT count(id_percurso) AS qnt, marcas.descricao AS marca, modelos.descricao AS modelo, placa, data_saida
                                                        FROM percursos, viaturas, marcas, modelos
                                                        WHERE data_saida BETWEEN ? AND ?
                                                       AND percursos.id_viatura = viaturas.id_viatura
                                                        AND viaturas.id_marca = marcas.id_marca
                                                        AND viaturas.id_modelo = modelos.id_modelo 
                                                        GROUP BY marca, modelo, placa");
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
