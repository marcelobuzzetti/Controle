<?php
class Motorista{ 
    public function listarMotoristas(){
        include '../configs/conexao.php';
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
    
    public function listarMotoristasCadastrados(){
        include '../configs/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_motorista, nome, habilitacoes.categoria AS categoria, sigla
                                                FROM motoristas, habilitacoes, posto_grad
                                                WHERE motoristas.id_habilitacao = habilitacoes.id_habilitacao
                                                AND motoristas.id_posto_grad = posto_grad.id_posto_grad");
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
