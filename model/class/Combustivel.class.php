<?php



class Combustivel {

    public function listarCombustiveisAbastecimento() {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT combustiveis.id_combustivel AS id_combustivel, descricao
                                                    FROM combustiveis, recibos_combustiveis
                                                    WHERE combustiveis.id_combustivel IN (SELECT recibos_combustiveis.id_combustivel
                                                                                                                  FROM recibos_combustiveis)
                                                    GROUP BY combustiveis.id_combustivel");
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

    public function listarCombustiveis() {
        include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM combustiveis;");
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
