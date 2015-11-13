<?php

class Combustivel{ 
    public function listarCombustiveisAbastecimento(){
        include '../configs/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT combustiveis.id_combustivel AS id_comb, descricao
                                                    FROM combustiveis, recibos_combustiveis
                                                    WHERE combustiveis.id_combustivel IN (SELECT recibos_combustiveis.id_combustivel
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
    
    public function listarCombustiveis(){
        include '../configs/conexao.php';
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
