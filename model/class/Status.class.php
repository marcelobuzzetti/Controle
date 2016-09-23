<?php

class Status {

    public function listarStatus() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM status");
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
