<?php



class EstadoCidade {

    public function listarEstado() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT *
                                                    FROM estados");
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

    public function listarCidades() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT *
                                                    FROM cidades");
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
