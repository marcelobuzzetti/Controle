<?php

class CombustivelExistencia{ 
    public function listarCombustiveisExistentes(){
        include '../model/conexao.php';
         try {
                $stmt = $pdo->prepare("SELECT c.descricao AS combustivel, tc.descricao AS tipo_combustivel, (IFNULL(SUM( rc.qnt ),0) - IFNULL(SUM(a.qnt),0)) AS qnt
                                                    FROM (recibos_combustiveis rc) 
                                                    RIGHT JOIN (combustiveis c, tipos_combustiveis tc) ON (rc.id_combustivel = c.id_combustivel AND rc.id_tipo_combustivel = tc.id_tipo_combustivel)
                                                    LEFT JOIN abastecimentos a ON c.id_combustivel = a.id_combustivel and tc.id_tipo_combustivel = a.id_tipo_combustivel
                                                    GROUP BY c.id_combustivel, tc.id_tipo_combustivel
                                                    ORDER BY c.descricao , tc.descricao");
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

