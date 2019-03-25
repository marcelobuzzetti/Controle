<?php

class Militar {

    public function listarMilitar() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, 
            sigla, militares.nome AS nome, nome_completo, status,
            DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, 
            IFNULL((SELECT cidades.nome FROM cidades where militares.id_cidade = cidades.id_cidade),'-') AS cidade_nascimento, 
            IFNULL((SELECT estados.uf FROM estados where militares.id_estado = estados.id_estado),'-') AS estado_nascimento, idt_militar, cpf                                                 FROM militares, posto_grad, 
            status
            WHERE militares.id_status = status.id_status
            AND militares.id_posto_grad = posto_grad.id_posto_grad
            AND militares.id_status !=2
            ORDER BY posto_grad.id_posto_grad DESC");
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

    public function listarMilitarInativo() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, 
            sigla, militares.nome AS nome, nome_completo, status,
            DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, 
            IFNULL((SELECT cidades.nome FROM cidades where militares.id_cidade = cidades.id_cidade),'-') AS cidade_nascimento, 
            IFNULL((SELECT estados.uf FROM estados where militares.id_estado = estados.id_estado),'-') AS estado_nascimento, idt_militar, cpf                                                 FROM militares, posto_grad, 
            status
            WHERE militares.id_status = status.id_status
            AND militares.id_posto_grad = posto_grad.id_posto_grad
            AND militares.id_status !=1
            ORDER BY posto_grad.id_posto_grad DESC");
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

    public function listarMilitarUsuario() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar,sigla, nome, nome_completo, 
                                                status
                                                FROM militares, posto_grad, status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status != 2
                                                AND militares.id_militar NOT IN (SELECT IFNULL(id_militar, 0) as id_militar FROM usuarios)
                                                ORDER BY posto_grad.id_posto_grad DESC");
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

    public function listarMilitarMotorista() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT id_militar, sigla, nome
                                                FROM militares, posto_grad
                                                WHERE militares.id_posto_grad = posto_grad.id_posto_grad                                                
                                                AND militares.id_status !=2
                                                AND militares.id_militar NOT IN (SELECT id_militar FROM motoristas)
                                                ORDER BY posto_grad.id_posto_grad DESC");
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

    public function listarMilitarAtualizar($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, 
                                                militares.id_posto_grad AS id_posto_grad,sigla, nome, nome_completo, 
                                                DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, 
                                                id_cidade, id_estado, idt_militar,cpf, status
                                                FROM militares, posto_grad, 
                                                status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status !=2
                                                AND militares.id_militar = $id
                                                ORDER BY posto_grad.id_posto_grad DESC");
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

    public function listarTelefoneMilitarAtualizar($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar,  id_telefone, tipo, numero, telefones.id_status AS id_status
                                                FROM militares, telefones
                                                WHERE militares.id_militar = $id
                                                AND militares.id_militar = telefones.id_militar");
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

    public function listarEnderecoMilitarAtualizar($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT enderecos.*
                                                FROM militares, enderecos
                                                WHERE militares.id_militar = $id
                                                AND militares.id_militar = enderecos.id_militar");
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

    public function listarEmailMilitarAtualizar($id) {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT emails.*
                                                FROM militares, emails
                                                WHERE militares.id_militar = $id
                                                AND militares.id_militar = emails.id_militar");
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
