<?php



class PostoGrad {

    public function listarPostoGrad() {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM posto_grad");
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
