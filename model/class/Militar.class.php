<?php
class Militar{ 
    public function listarMilitar(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar,sigla, nome, nome_completo, DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento , rg, orgao_expedidor, cpf, status
                                                FROM militares, posto_grad, status
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status != 2");
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
