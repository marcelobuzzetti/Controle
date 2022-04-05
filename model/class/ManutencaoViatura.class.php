<?php



class ManutencaoViatura {

    public function listarMntVtr() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_manutencao_viatura, marcas.descricao AS marca,modelos.descricao AS  modelo,placa,manutencao_viaturas.odometro, manutencao_viaturas.descricao, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                                    FROM viaturas, marcas, modelos, manutencao_viaturas
                                                    WHERE viaturas.id_marca = marcas.id_marca 
                                                    AND viaturas.id_modelo = modelos.id_modelo
                                                    AND manutencao_viaturas.id_viatura = viaturas.id_viatura");
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
