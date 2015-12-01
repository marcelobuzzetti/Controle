<?php

class Usuario{
    public function listarUsuario(){
        include '../model/conexao.php';
          try {
            $stmt = $pdo->prepare("SELECT id_usuario,login,descricao,nome 
                                                FROM usuarios, perfis
                                                WHERE cod_perfil = usuarios.id_perfil");
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

