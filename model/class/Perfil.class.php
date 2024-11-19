<?php



class Perfil extends Model {

    public function listarPerfil() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM perfis");
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
