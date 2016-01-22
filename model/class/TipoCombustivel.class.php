<?php

class TipoCombustivel{ 
    
public function listarTiposCombustiveis(){
        include '../model/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT * FROM tipos_combustiveis");
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

public function listarTiposCombustiveisAbastecimento(){
        include '../model/conexao.php';
          try {
                $stmt = $pdo->prepare("SELECT tipos_combustiveis.id_tipo_combustivel AS id_tipo_combustivel, descricao 
                                                    FROM tipos_combustiveis, recibos_combustiveis
                                                    WHERE tipos_combustiveis.id_tipo_combustivel IN (SELECT recibos_combustiveis.id_tipo_combustivel            
                                                                                                                                  FROM recibos_combustiveis)");
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

