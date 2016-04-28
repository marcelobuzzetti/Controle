<?php

class CombustivelExistencia{ 
    public function listarCombustiveisExistentes(){
        include '../model/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT cr.combustivel AS combustivel, cr.tipo_combustivel AS tipo_combustivel, cr.qnt - ca.qnt AS qnt
                                                    FROM combustivel_abastecido ca, combustivel_recebido cr
                                                    WHERE cr.combustivel = ca.combustivel
                                                    AND cr.tipo_combustivel = ca.tipo_combustivel
                                                    GROUP BY cr.combustivel, cr.tipo_combustivel");
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

