<?php



class Habilitacao {

    public function listarHabilitacoes() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM habilitacoes");
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
