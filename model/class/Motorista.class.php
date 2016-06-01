<?php
class Motorista{ 
    public function listarMotoristas(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas WHERE id_status != 2 AND 
                                                                                            id_motorista NOT IN (SELECT id_motorista
                                                                                                                             FROM percursos 
                                                                                                                             WHERE data_retorno IS NULL)");
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
    
    public function listarMotoristasCadastrados(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT sigla, nome, nome_completo, cnh, DATE_FORMAT( validade,  '%d/%m/%Y' ) AS validade, categoria, status
                                                FROM militares, posto_grad, 
                                                STATUS , motoristas, habilitacoes
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_militar = motoristas.id_militar
                                                AND motoristas.id_habilitacao = habilitacoes.id_habilitacao");
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
    
      public function listarMotoristasCompleto(){
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM motoristas");
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
