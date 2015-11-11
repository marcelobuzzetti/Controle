<?php

class Abastecimento{ 
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

