<?php

class Abastecimento {

    public function listarAbastecimentos() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT usuarios.nome, id_abastecimento, nrvale,  motoristas.apelido AS apelido, marcas.descricao AS marca, modelos.descricao AS modelo, viaturas.placa AS placa, abastecimentos.odometro AS odometro, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                    FROM abastecimentos, marcas, modelos, viaturas, motoristas, combustiveis, tipos_combustiveis, usuarios
                                    WHERE abastecimentos.id_motorista = motoristas.id_motorista
                                    AND abastecimentos.id_viatura = viaturas.id_viatura
                                    AND abastecimentos.id_combustivel = combustiveis.id_combustivel
                                    AND abastecimentos.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                    AND viaturas.id_modelo = modelos.id_modelo
                                    AND viaturas.id_marca = marcas.id_marca
                                    AND abastecimentos.id_usuario = usuarios.id_usuario
                                    ORDER BY data DESC, hora DESC;");
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

    public function listarAbastecimentosEspeciais() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT usuarios.nome, id_abastecimento_especial, nrvale, ae.descricao AS descricao, combustiveis.descricao AS combustivel, tipos_combustiveis.descricao AS tipo, qnt, hora, DATE_FORMAT(data,'%d/%m/%Y') AS data
                                    FROM abastecimentos_especiais ae, combustiveis, tipos_combustiveis, usuarios
                                    WHERE ae.id_combustivel = combustiveis.id_combustivel
                                    AND ae.id_tipo_combustivel = tipos_combustiveis.id_tipo_combustivel
                                    AND usuarios.id_usuario = ae.id_usuario
                                    ORDER BY data DESC, hora DESC;");
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
