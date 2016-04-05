<?php

class Modelo{ 
    public function listarModelos(){
        include '../model/conexao.php';
         try {
            $stmt = $pdo->prepare("SELECT id_modelo, marcas.descricao AS marca, modelos.descricao AS descricao, cap_tanque, consumo_padrao, cap_transp
                                               FROM modelos, marcas
                                               WHERE modelos.id_marca = marcas.id_marca;");
            $executa = $stmt->execute();

            if ($executa) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                print("<script language=JavaScript>
                       alert('Não foi possível criar tabela de modelos.');
                       </script>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }   
    
    public function listarModelosCadastrados(){
        include '../model/conexao.php';
         try {
            $stmt = $pdo->prepare("SELECT * FROM  modelos");
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
