<?php

include '../include/config.inc.php';
include '../model/conexao.php';

header('Content-type: application/json');
  {
    
        try {
            $stmt = $pdo->prepare("SELECT CONCAT(marcas.descricao, ' ', modelos.descricao, ' ',placa) AS viatura , motoristas.apelido AS apelido, nome_destino, odo_saida, IFNULL(acompanhante,'Sem Acompanhantes') AS acompanhante,  CONCAT(DATE_FORMAT(data_saida,'%d/%m/%Y'), ' ', hora_saida) AS data_saida
                                                       FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                                       WHERE data_retorno IS NULL 
                                                       AND percursos.id_motorista = motoristas.id_motorista
                                                       AND percursos.id_viatura = viaturas.id_viatura
                                                       AND viaturas.id_marca = marcas.id_marca
                                                       AND viaturas.id_modelo = modelos.id_modelo
                                                       AND percursos.id_destino = destinos.id_destino
                                                       AND (percursos.status != 2 OR percursos.status IS NULL)
                                                       ORDER BY id_percurso DESC");
            $executa = $stmt->execute();

            if ($executa) {
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            } else {
                print("<script language=JavaScript>
                              alert('Não foi possível criar tabela de Viaturas Rodando.');
                              </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }