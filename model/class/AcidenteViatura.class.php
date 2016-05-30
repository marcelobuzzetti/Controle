<?php

class AcidenteViatura {

    public function listarAcidenteVtr() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_acidente_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa, IFNULL(acompanhante,'Sem Acompanhante') AS acompanhante, motoristas.apelido AS motorista, acidentes_viaturas.odometro AS odometro, acidentes_viaturas.descricao AS descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data, avarias
                                                    FROM viaturas, marcas, modelos, acidentes_viaturas, motoristas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND motoristas.id_motorista = acidentes_viaturas.id_motorista
                                                    AND acidentes_viaturas.id_viatura = viaturas.id_viatura");
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
