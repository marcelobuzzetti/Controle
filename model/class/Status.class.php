<?php



class Status extends Model {

    public function listarStatus() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM status");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo 'Erro ao inserir os dados';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
