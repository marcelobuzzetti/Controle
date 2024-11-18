<?php



class PostoGrad {

    public function listarPostoGrad() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM posto_grad");
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
