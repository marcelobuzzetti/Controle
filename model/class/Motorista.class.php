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
            $stmt = $pdo->prepare("SELECT id_motorista, nome, habilitacoes.categoria AS categoria, sigla, nome_completo, data_nascimento, cnh, cpf, rg, orgao_expedidor, validade
                                                FROM motoristas, habilitacoes, posto_grad
                                                WHERE motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_posto_grad = posto_grad.id_posto_grad
                                                AND motoristas.id_status != 2");
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
