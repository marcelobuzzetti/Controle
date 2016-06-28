<?php

class Militar {

    public function listarMilitar() {
        include '../model/conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, IFNULL(numero_militar,'-') AS numero_militar, IFNULL(cp,'-') AS cp, 
                                                IFNULL(grupo,'-') AS grupo, IFNULL(antiguidade,'-') AS antiguidade, 
                                                IFNULL(DATE_FORMAT( data_praca,  '%d/%m/%Y' ),'-') AS data_praca,sigla, nome, nome_completo, 
                                                DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, cidade_nascimento, 
                                                estado_nascimento, idt_militar,rg, orgao_expedidor, cpf, IFNULL(conjuge,'-') AS conjuge, 
                                                IFNULL(DATE_FORMAT( data_nascimento_conjuge,  '%d/%m/%Y' ),'-') AS data_nascimento_conjuge,
                                                IFNULL(pai,'-') AS pai, IFNULL(mae,'-') AS mae, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT( 'Tipo: ',tipo,  ' Número: ', numero,' ',status,'<br/>' ) SEPARATOR ' ') 
                                                FROM telefones, status
                                                WHERE militares.id_militar = telefones.id_militar
                                                AND status.id_status = telefones.id_status
                                                ),'-') AS telefones, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT(tipo,  ' ', rua,  ' - ', bairro,  ' - ', complemento,  ' ', cidade,  '/', estado,' ',status,  '<br/>' ) 
                                                SEPARATOR  ' ' ) 
                                                FROM enderecos, status
                                                WHERE militares.id_militar = enderecos.id_militar
                                                AND status.id_status = enderecos.id_status
                                                ),'-') AS enderecos, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT(email, ' ',status,'<br/>') SEPARATOR ' ' ) 
                                                FROM emails,status
                                                WHERE militares.id_militar = emails.id_militar
                                                AND status.id_status = emails.id_status
                                                ),'-') AS emails, 
                                                status, laranjeira
                                                FROM militares, posto_grad, 
                                                status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status !=2
                                                ORDER BY posto_grad.id_posto_grad DESC,antiguidade, militares.id_militar");
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
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, IFNULL(numero_militar,'-') AS numero_militar, IFNULL(cp,'-') AS cp, 
                                                IFNULL(grupo,'-') AS grupo, IFNULL(antiguidade,'-') AS antiguidade, 
                                                IFNULL(DATE_FORMAT( data_praca,  '%d/%m/%Y' ),'-') AS data_praca,sigla, nome, nome_completo, 
                                                DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, cidade_nascimento, 
                                                estado_nascimento, idt_militar,rg, orgao_expedidor, cpf, IFNULL(conjuge,'-') AS conjuge, 
                                                IFNULL(DATE_FORMAT( data_nascimento_conjuge,  '%d/%m/%Y' ),'-') AS data_nascimento_conjuge,
                                                IFNULL(pai,'-') AS pai, IFNULL(mae,'-') AS mae, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT( 'Tipo: ',tipo,  ' Número: ', numero,' ',status,'<br/>' ) SEPARATOR ' ') 
                                                FROM telefones, status
                                                WHERE militares.id_militar = telefones.id_militar
                                                AND status.id_status = telefones.id_status
                                                ),'-') AS telefones, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT(tipo,  ' ', rua,  ' - ', bairro,  ' - ', complemento,  ' ', cidade,  '/', estado,' ',status,  '<br/>' ) 
                                                SEPARATOR  ' ' ) 
                                                FROM enderecos, status
                                                WHERE militares.id_militar = enderecos.id_militar
                                                AND status.id_status = enderecos.id_status
                                                ),'-') AS enderecos, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT(email, ' ',status,'<br/>') SEPARATOR ' ' ) 
                                                FROM emails,status
                                                WHERE militares.id_militar = emails.id_militar
                                                AND status.id_status = emails.id_status
                                                ),'-') AS emails, 
                                                status, laranjeira
                                                FROM militares, posto_grad, 
                                                status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status !=1
                                                ORDER BY posto_grad.id_posto_grad DESC,antiguidade, militares.id_militar");
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
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, IFNULL(numero_militar,'-') AS numero_militar, IFNULL(cp,'-') AS cp, IFNULL(grupo,'-') AS grupo, IFNULL(antiguidade,'-') AS antiguidade, IFNULL(DATE_FORMAT( data_praca,  '%d/%m/%Y' ),'-') AS data_praca,sigla, nome, nome_completo, DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, cidade_nascimento, estado_nascimento, idt_militar,rg, orgao_expedidor, cpf, IFNULL(conjuge,'-') AS conjuge, IFNULL(DATE_FORMAT( data_nascimento_conjuge,  '%d/%m/%Y' ),'-') AS data_nascimento_conjuge,IFNULL(pai,'-') AS pai, IFNULL(mae,'-') AS mae, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT( 'Tipo: ',tipo,  ' Número: ', numero,'\n' ) SEPARATOR ' ') 
                                                FROM telefones
                                                WHERE militares.id_militar = telefones.id_militar
                                                ),'-') AS telefones, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT('Tipo: ', tipo,  ' Rua: ', rua,  ' Bairro: ', bairro,  ' Comp.: ', complemento,  ' Cidade: ', cidade,  ' Estado: ', estado,  '<br/>' ) 
                                                SEPARATOR  ' ' ) 
                                                FROM enderecos
                                                WHERE militares.id_militar = enderecos.id_militar
                                                ),'-') AS enderecos, IFNULL((
                                                SELECT GROUP_CONCAT( CONCAT(email,'<br/>') SEPARATOR ' ' ) 
                                                FROM emails
                                                WHERE militares.id_militar = emails.id_militar
                                                ),'-') AS emails, 
                                                status, laranjeira
                                                FROM militares, posto_grad, 
                                                status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status !=2
                                                AND militares.id_militar NOT IN (SELECT id_militar FROM usuarios)
                                                ORDER BY antiguidade, militares.id_militar");
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
                                                ORDER BY antiguidade");
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
            $stmt = $pdo->prepare("SELECT militares.id_militar AS id_militar, IFNULL(numero_militar,'-') AS numero_militar, IFNULL(cp,'-') AS cp, IFNULL(grupo,'-') AS grupo, IFNULL(antiguidade,'-') AS antiguidade, IFNULL(DATE_FORMAT( data_praca,  '%d/%m/%Y' ),'-') AS data_praca,militares.id_posto_grad AS id_posto_grad,sigla, nome, nome_completo, DATE_FORMAT( data_nascimento,  '%d/%m/%Y' ) AS data_nascimento, cidade_nascimento, estado_nascimento, idt_militar,rg, orgao_expedidor, cpf, IFNULL(conjuge,'-') AS conjuge, IFNULL(DATE_FORMAT( data_nascimento_conjuge,  '%d/%m/%Y' ),'-') AS data_nascimento_conjuge,IFNULL(pai,'-') AS pai, IFNULL(mae,'-') AS mae, status, laranjeira
                                                FROM militares, posto_grad, 
                                                status 
                                                WHERE militares.id_status = status.id_status
                                                AND militares.id_posto_grad = posto_grad.id_posto_grad
                                                AND militares.id_status !=2
                                                AND militares.id_militar = $id
                                                ORDER BY antiguidade, militares.id_militar");
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
