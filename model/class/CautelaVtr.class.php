<?php

class CautelaVtr extends Model {

    public function listarCautelaVtr() {
        try {
            $stmt = $this->pdo->prepare("SELECT id_alteracao_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,alteracao_viaturas.odometro AS odometro, alteracao_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data
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

}
