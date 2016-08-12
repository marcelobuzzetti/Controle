<?php

class Usuario {

    public function listarUsuario($login) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT usuarios.id_usuario AS id_usuario,sigla, militares.nome AS nome_guerra, login,perfis.descricao,usuarios.nome
                                                FROM usuarios, perfis, militares, posto_grad
                                                WHERE cod_perfil = usuarios.id_perfil
                                                AND militares.id_militar = usuarios.id_militar
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND usuarios.id_usuario = 1
                                                AND usuarios.id_usuario != $login
                                                AND usuarios.id_status != 2");
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

    public function listarUsuarioAtualizar($id) {
        include '../model/conexao.php';
        try {
            if($id != 1){
            $stmt = $pdo->prepare("SELECT id_usuario,login,descricao,nome, id_militar, usuarios.id_perfil AS id_perfil, nome
                                                FROM usuarios, perfis
                                                WHERE cod_perfil = usuarios.id_perfil
                                                AND login != 'admin'
                                                AND usuarios.id_usuario = $id
                                                AND usuarios.id_status != 2");
            $executa = $stmt->execute();
            } else {
                $stmt = $pdo->prepare("SELECT id_usuario,login,descricao,nome, id_militar, usuarios.id_perfil AS id_perfil, nome
                                                FROM usuarios, perfis
                                                WHERE cod_perfil = usuarios.id_perfil
                                                AND usuarios.id_usuario = $id
                                                AND usuarios.id_status != 2");
            $executa = $stmt->execute();
            }

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
    
    public function listarUsuarioInativos(){
        include '../model/conexao.php';
          try {
            $stmt = $pdo->prepare("SELECT usuarios.id_usuario AS id_usuario,sigla, militares.nome AS nome_guerra, login,perfis.descricao,usuarios.nome
                                                FROM usuarios, perfis, militares, posto_grad
                                                WHERE cod_perfil = usuarios.id_perfil
                                                AND militares.id_militar = usuarios.id_militar
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND usuarios.id_status = 2
                                                AND militares.id_status = 1");
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
