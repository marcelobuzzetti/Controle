<?php



class Marca extends Model {

    public function listarMarcas() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM marcas WHERE id_status != 2");
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
