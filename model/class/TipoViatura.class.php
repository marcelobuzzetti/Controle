<?php



class TipoViatura extends Model {

    public function listarTiposViaturas() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM tipos_viaturas");
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
