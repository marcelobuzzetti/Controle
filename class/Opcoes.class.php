<?php
class Opcoes{
    public function Url($valor){
            include './configs/conexao.php';
            $valor = 'path';
             try{
        $stmt = $pdo->prepare("SELECT valor FROM opcoes WHERE nome = ?;");
        $stmt->bindParam(1, $valor, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($executa) {
        return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            print("<script language=JavaScript>
                   alert('Não foi possível criar tabela de opcoes.');
                   </script>");
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        }
    
}

