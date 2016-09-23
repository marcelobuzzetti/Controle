<?php

class TipoViatura {

    public function listarTiposViaturas() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM tipos_viaturas");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                         alert('Não foi possível criar tabela tipo de viaturas.');
                         </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
