<?php

class AlteracaoViatura {

    public function listarAlteracaoVtr() {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_alteracao_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,alteracao_viaturas.odometro AS odometro, alteracao_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                                    FROM viaturas, marcas, modelos, alteracao_viaturas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND alteracao_viaturas.id_viatura = viaturas.id_viatura");
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

    public function listarDisponibilidadeVtr() {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_disponibilidade, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,
            indisponibilidade.odometro AS odometro, indisponibilidade.motivo AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data, DATE_FORMAT(data_fim,'%d/%m/%Y') AS data_fim,
            status.status, indisponibilidade.id_status, indisponibilidade.id_viatura
            FROM viaturas, marcas, modelos, indisponibilidade, status
            WHERE viaturas.id_marca = marcas.id_marca 
            AND viaturas.id_modelo = modelos.id_modelo
            AND indisponibilidade.id_viatura = viaturas.id_viatura
            AND indisponibilidade.id_status = status.id_status");
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

    public function listarDisponibilidade($id) {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_disponibilidade, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,
            indisponibilidade.odometro AS odometro, indisponibilidade.motivo AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data, DATE_FORMAT(data_fim,'%d/%m/%Y') AS data_fim,
            status.status, indisponibilidade.id_status, indisponibilidade.id_viatura
            FROM viaturas, marcas, modelos, indisponibilidade, status
            WHERE viaturas.id_marca = marcas.id_marca 
            AND viaturas.id_viatura = $id
            AND viaturas.id_modelo = modelos.id_modelo
            AND indisponibilidade.id_viatura = viaturas.id_viatura
            AND indisponibilidade.id_status = status.id_status");
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
