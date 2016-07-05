<?php

include '../model/conexao.php';
session_start();
$usuario = $_SESSION['usuario'];
switch ($_POST['enviar']) {

    case 'percurso_retornou':
        $id = $_POST['id'];
        $odo_retorno = $_POST['odo_retorno'];

        try {
            $stmt = $pdo->prepare("UPDATE percursos 
                                                SET odo_retorno= ?, data_retorno=NOW(), hora_retorno=NOW() 
                                                WHERE id_percurso= ?");
            $stmt->bindParam(1, $odo_retorno, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /percurso');

        break;

    case 'Apagar':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM percursos
                                                WHERE id_percurso= ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /percurso');

        break;

    case 'percurso':
        $viatura = $_POST["viatura"];
        $nome = $_POST["motorista"];
        $destino = ucwords(strtolower($_POST["destino"]));
        $odometro = $_POST["odo_saida"];
        if (empty($_POST["acompanhante"])) {
            $acompanhante = NULL;
        } else {
            $acompanhante = ucwords(strtolower($_POST["acompanhante"]));
        }
        try {
            $stmt = $pdo->prepare("SELECT COUNT(nome_destino) AS existente
                                                FROM destinos
                                                WHERE nome_destino = ?");
            $stmt->bindParam(1, $destino, PDO::PARAM_STR);
            $executa = $stmt->execute();

            $reg = $stmt->fetch(PDO::FETCH_OBJ);
            if ($reg->existente < 1) {

                $stmt = $pdo->prepare("INSERT INTO destinos
                                                   VALUES(NULL,?)");
                $stmt->bindParam(1, $destino, PDO::PARAM_STR);
                $executa = $stmt->execute();

                $stmt = $pdo->prepare("SELECT id_destino
                                                    FROM destinos
                                                    WHERE nome_destino = ?");
                $stmt->bindParam(1, $destino, PDO::PARAM_STR);
                $executa = $stmt->execute();
                $reg = $stmt->fetch(PDO::FETCH_OBJ);
                $destino = $reg->id_destino;
            } else {

                $stmt = $pdo->prepare("SELECT id_destino
                                                                FROM destinos
                                                                WHERE nome_destino = ?");
                $stmt->bindParam(1, $destino, PDO::PARAM_STR);
                $executa = $stmt->execute();
                $reg = $stmt->fetch(PDO::FETCH_OBJ);
                $destino = $reg->id_destino;
            }

            $stmt = $pdo->prepare("INSERT INTO percursos
                                                VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL,NULL,$usuario)");
            $stmt->bindParam(1, $viatura, PDO::PARAM_INT);
            $stmt->bindParam(2, $nome, PDO::PARAM_INT);
            $stmt->bindParam(3, $destino, PDO::PARAM_INT);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $acompanhante, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /percurso');

        break;

    case 'viatura':
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $placa = mb_strtoupper($_POST["placa"]);
        $odometro = $_POST["odometro"];
        $ano = $_POST["ano"];
        $tipo_viatura = $_POST["tipo_viatura"];
        $situacao = $_POST["situacao"];
        $habilitacao = $_POST["habilitacao"];
        $combustivel = $_POST["combustivel"];

        try {
            $stmt = $pdo->prepare("INSERT INTO viaturas
                                                    VALUES(NULL,?,?,?,?,?,?,?,$usuario,1,?,?)");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_INT);
            $stmt->bindParam(3, $placa, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $ano, PDO::PARAM_INT);
            $stmt->bindParam(6, $tipo_viatura, PDO::PARAM_INT);
            $stmt->bindParam(7, $situacao, PDO::PARAM_INT);
            $stmt->bindParam(8, $habilitacao, PDO::PARAM_INT);
            $stmt->bindParam(9, $combustivel, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                 $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /viaturascadastradas');

        break;

    case 'apagar_viatura':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM viaturas
                                                WHERE id_viatura=" . $id);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE viaturas
                                                SET id_status = 2
                                                WHERE id_viatura = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                       if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                 $_SESSION['apagado'] = 1;
            }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else{
                 $_SESSION['apagado'] = 1;
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /viaturascadastradas');

        break;

    case 'atualizar_viatura':
        $id = $_POST['id'];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $placa = mb_strtoupper($_POST["placa"]);
        $odometro = $_POST["odometro"];
        $ano = $_POST["ano"];
        $situacao = $_POST["situacao"];
        $tipo_viatura = $_POST["tipo_viatura"];
        $habilitacao = $_POST["habilitacao"];
        $combustivel = $_POST["combustivel"];



        try {
            $stmt = $pdo->prepare("UPDATE viaturas
                                                SET id_marca = ?, id_modelo = ?, placa = ?, odometro = ?, 
                                                ano = ?,   id_tipo_viatura =?, id_situacao = ?, 
                                                id_habilitacao = ?, id_combustivel = ?
                                                WHERE id_viatura = ?");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_INT);
            $stmt->bindParam(3, $placa, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $ano, PDO::PARAM_INT);
            $stmt->bindParam(6, $tipo_viatura, PDO::PARAM_INT);
            $stmt->bindParam(7, $situacao, PDO::PARAM_INT);
            $stmt->bindParam(8, $habilitacao, PDO::PARAM_INT);
            $stmt->bindParam(9, $combustivel, PDO::PARAM_INT);
            $stmt->bindParam(10, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

              if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                 $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /viaturascadastradas');

        break;

    case 'motorista':
        $id_militar = $_POST['militar'];
        $categoria = $_POST['categoria'];
        $cnh = $_POST['cnh'];
        $validade = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['validade'])));

        try {

            $stmt = $pdo->prepare("SELECT sigla, nome
                                                FROM posto_grad, militares
                                                WHERE posto_grad.id_posto_grad = militares.id_posto_grad
                                                AND militares.id_militar = ?");
            $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
            $executa = $stmt->execute();
            $dados_motoristas = $stmt->fetch(PDO::FETCH_OBJ);
            $sigla = $dados_motoristas->sigla;
            $nome = $dados_motoristas->nome;

            $apelido = $sigla . " " . $nome;

            $stmt = $pdo->prepare("INSERT INTO motoristas
                                                VALUES(NULL,?,?,?,?,?,$usuario,1)");
            $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
            $stmt->bindParam(2, $categoria, PDO::PARAM_INT);
            $stmt->bindParam(3, $cnh, PDO::PARAM_STR);
            $stmt->bindParam(4, $validade, PDO::PARAM_STR);
            $stmt->bindParam(5, $apelido, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /motoristascadastrados');

        break;

    case 'atualizar_motorista':
        $id = $_POST['id'];
        $id_militar = $_POST['militar'];
        $categoria = $_POST['categoria'];
        $cnh = $_POST['cnh'];
        $validade = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['validade'])));


        try {

            $stmt = $pdo->prepare("SELECT sigla, nome
                                                FROM posto_grad, militares
                                                WHERE posto_grad.id_posto_grad = militares.id_posto_grad
                                                AND militares.id_militar = ?");
            $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
            $executa = $stmt->execute();
            $dados_motoristas = $stmt->fetch(PDO::FETCH_OBJ);
            $sigla = $dados_motoristas->sigla;
            $nome = $dados_motoristas->nome;

            $apelido = $sigla . " " . $nome;

            $stmt = $pdo->prepare("UPDATE motoristas
                                                SET id_militar = ?, id_habilitacao = ?, cnh = ?, validade = ?, apelido = ?
                                                WHERE id_motorista = ?");
            $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
            $stmt->bindParam(2, $categoria, PDO::PARAM_INT);
            $stmt->bindParam(3, $cnh, PDO::PARAM_STR);
            $stmt->bindParam(4, $validade, PDO::PARAM_STR);
            $stmt->bindParam(5, $apelido, PDO::PARAM_STR);
            $stmt->bindParam(6, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /motoristascadastrados');

        break;


    case 'Apagar Motorista':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM motoristas
                                                WHERE id_motorista= ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE motoristas
                                                SET id_status = 2
                                                WHERE id_motorista = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                    if ($executa) {
                        $_SESSION['apagado'] = 1;
                    } else {
                        $_SESSION['erro'] = 1;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /motoristascadastrados');

        break;

    case 'ativar_motorista':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE motoristas
                                                SET id_status = 1
                                                WHERE id_motorista = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            if ($executa) {
                $_SESSION['ativado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /motoristascadastrados');

        break;

    case 'cadastrar_usuario':
        $militar = $_POST['militar'];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $perfil = $_POST['perfil'];
        $apelido = ucwords(strtolower($_POST['apelido']));

        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios 
                                                VALUES(NULL,?,?,?,?,?,1,?)");
            $stmt->bindParam(1, $militar, PDO::PARAM_INT);
            $stmt->bindParam(2, $login, PDO::PARAM_STR);
            $stmt->bindParam(3, $senha, PDO::PARAM_STR);
            $stmt->bindParam(4, $perfil, PDO::PARAM_INT);
            $stmt->bindParam(5, $apelido, PDO::PARAM_STR);
            $stmt->bindParam(6, $usuario, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $_SESSION['cadastrado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (!$executa) {
            $_SESSION['erro'] = 1;
        } else {
            $_SESSION['cadastrado'] = 1;
        }

        header('Location: /usuarioscadastrados');

        break;

    case 'apagar_usuario':
        $id = $_POST['id'];

        try {


            $stmt = $pdo->prepare("UPDATE usuarios
                                                SET id_status = 2
                                                WHERE id_usuario = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $_SESSION['apagado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /usuarioscadastrados');

        break;

    case 'ativar_usuario':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE usuarios 
                                                SET id_status = 1
                                                WHERE id_usuario=" . $id);
            $executa = $stmt->execute();

            if ($executa) {
                $_SESSION['ativado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /usuarioscadastrados');

        break;

    case 'atualizar_usuario':
        $id = $_POST['id'];
        $militar = $_POST['militar'];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $perfil = $_POST['perfil'];
        $apelido = ucwords(strtolower($_POST['apelido']));


        try {
            $stmt = $pdo->prepare("UPDATE usuarios
                                                SET login = ?, senha = ?, id_perfil = ?, nome = ?, id_militar = ?
                                               WHERE id_usuario = ?");
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->bindParam(3, $perfil, PDO::PARAM_INT);
            $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
            $stmt->bindParam(5, $militar, PDO::PARAM_INT);
            $stmt->bindParam(6, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $_SESSION['atualizado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /usuarioscadastrados');

        break;

    case 'combustivel':
        $descricao = ucwords(strtolower($_POST['descricao']));


        try {
            $stmt = $pdo->prepare("INSERT INTO combustiveis
                                                VALUES(NULL,?,$usuario)");
            $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /combustivel');

        break;

    case 'apagar_combustivel':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM combustiveis
                                                WHERE id_combustivel =" . $id);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE combustiveis
                                                SET id_status = 2
                                                WHERE id_combustivel = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                    if ($executa) {
                        $_SESSION['apagado'] = 1;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /combustivel');

        break;

    case 'atualizar_combustivel':
        $id = $_POST['id'];
        $descricao = ucwords(strtolower($_POST['descricao']));

        try {
            $stmt = $pdo->prepare("UPDATE combustiveis
                                                SET descricao = ? WHERE id_combustivel = ?");
            $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /combustivel');

        break;

    case 'tipo':
        $descricao = ucwords(strtolower($_POST['descricao']));


        try {
            $stmt = $pdo->prepare("INSERT INTO tipos_combustiveis
                                                VALUES(NULL,?,$usuario)");
            $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /tiposcombustiveiscadastrados');

        break;

    case 'apagar_tipo':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM tipos_combustiveis
                                                WHERE id_tipo_combustivel= ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE tipos_combustiveis
                                                SET id_status = 2
                                                WHERE id_tipo_combustivel = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /tiposcombustiveiscadastrados');
        break;

    case 'atualizar_tipo':
        $id = $_POST['id'];
        $descricao = ucwords(strtolower($_POST['descricao']));

        try {
            $stmt = $pdo->prepare("UPDATE tipos_combustiveis
                                                SET descricao = ? WHERE id_tipo_combustivel = ?");
            $stmt->bindParam(1, $descricao, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /tiposcombustiveiscadastrados');
        break;

    case 'rcb_comb':
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];
        $motivo = mb_strtoupper($_POST['motivo']);


        try {
            $stmt = $pdo->prepare("INSERT INTO recibos_combustiveis
                                                VALUES(NULL,?,?,?,?,NOW(),NOW(),$usuario)");
            $stmt->bindParam(1, $combustivel, PDO::PARAM_INT);
            $stmt->bindParam(2, $tp, PDO::PARAM_INT);
            $stmt->bindParam(3, $qnt, PDO::PARAM_INT);
            $stmt->bindParam(4, $motivo, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /recebimentocombustivel');

        break;

    case 'apagar_rcb_comb':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM recibos_combustiveis
                                                WHERE id_recibo_combustivel = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE recibos_combustiveis
                                                SET id_status = 2
                                                WHERE id_recibo_combustivel = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        header('Location: /recebimentocombustivel');

        break;

    case 'atualizar_rcb_comb':
        $id = $_POST['id'];
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];
        $motivo = mb_strtoupper($_POST['motivo']);

        try {
            $stmt = $pdo->prepare("UPDATE recibos_combustiveis
                                                SET id_combustivel = ?, id_tipo_combustivel =?, qnt = ?, motivo = ?, data = NOW(), hora = NOW() WHERE id_recibo_combustivel = ?");
            $stmt->bindParam(1, $combustivel, PDO::PARAM_INT);
            $stmt->bindParam(2, $tp, PDO::PARAM_INT);
            $stmt->bindParam(3, $qnt, PDO::PARAM_INT);
            $stmt->bindParam(4, $motivo, PDO::PARAM_STR);
            $stmt->bindParam(5, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /recebimentocombustivel');

        break;

    case 'abst':
        $nrvale = $_POST['nrvale'];
        $motorista = $_POST['motorista'];
        $viatura = $_POST['viatura'];
        $odometro = $_POST['odometro'];
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];


        try {
            $stmt = $pdo->prepare("INSERT INTO abastecimentos
                                               VALUES(NULL,?,?,?,?,?,?,?,NOW(),NOW(),$usuario)");
            $stmt->bindParam(1, $nrvale, PDO::PARAM_STR);
            $stmt->bindParam(2, $motorista, PDO::PARAM_INT);
            $stmt->bindParam(3, $viatura, PDO::PARAM_INT);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $combustivel, PDO::PARAM_INT);
            $stmt->bindParam(6, $tp, PDO::PARAM_INT);
            $stmt->bindParam(7, $qnt, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
                header("Location: /percurso");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /abastecimento');

        break;

    case 'apagar_abst':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM abastecimentos
                                                WHERE id_abastecimento = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE abastecimentos
                                                SET id_status = 2
                                                WHERE id_abastecimento = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();

                    if ($executa) {
                        $_SESSION['apagado'] = 1;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /abastecimento');

        break;

    case 'atualizar_abst':
        $id = $_POST['id'];
        $nrvale = $_POST['nrvale'];
        $motorista = $_POST['motorista'];
        $viatura = $_POST['viatura'];
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];

        try {
            $stmt = $pdo->prepare("UPDATE abastecimentos
                                                SET nrvale = ?, id_motorista =?, id_viatura = ?, id_combustivel = ?, id_tipo_combustivel = ?, qnt = ?, hora = NOW(), data = NOW() 
                                                WHERE id_abastecimento =" . $id);
            $stmt->bindParam(1, $nrvale, PDO::PARAM_STR);
            $stmt->bindParam(2, $motorista, PDO::PARAM_INT);
            $stmt->bindParam(3, $viatura, PDO::PARAM_INT);
            $stmt->bindParam(4, $combustivel, PDO::PARAM_INT);
            $stmt->bindParam(5, $tp, PDO::PARAM_INT);
            $stmt->bindParam(6, $qnt, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /abastecimento');

        break;

    case 'cadastrar_modelo':
        $marca = $_POST['marca_modelo'];
        $modelo = ucwords(strtolower($_POST['modelo']));
        $cap_tanque = $_POST['cap_tanque'];
        $consumo_padrao = $_POST['consumo_padrao'];
        $cap_transp = $_POST['cap_transp'];


        try {
            $stmt = $pdo->prepare("INSERT INTO modelos
                                                VALUES(NULL,?,?,?,?,?,1)");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
            $stmt->bindParam(3, $cap_tanque, PDO::PARAM_INT);
            $stmt->bindParam(4, $consumo_padrao, PDO::PARAM_INT);
            $stmt->bindParam(5, $cap_transp, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /modelo');

        break;

    case 'apagar_modelo':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM modelos
                                                WHERE id_modelo = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE modelos
                                                SET id_status = 2
                                                WHERE id_modelo = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();

                    if ($executa) {
                        $_SESSION['apagado'] = 1;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['apagada'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /modelo');

        break;

    case 'atualizar_modelo':
        $id = $_POST['id'];
        $marca = $_POST['marca_modelo'];
        $modelo = ucwords(strtolower($_POST['modelo']));
        $cap_tanque = $_POST['cap_tanque'];
        $consumo_padrao = $_POST['consumo_padrao'];
        $cap_transp = $_POST['cap_transp'];

        try {
            $stmt = $pdo->prepare("UPDATE modelos
                                                SET id_marca = ?, descricao = ?, cap_tanque = ?, consumo_padrao = ?, cap_transp = ? 
                                                WHERE id_modelo = ?");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
            $stmt->bindParam(3, $cap_tanque, PDO::PARAM_INT);
            $stmt->bindParam(4, $consumo_padrao, PDO::PARAM_INT);
            $stmt->bindParam(5, $cap_transp, PDO::PARAM_INT);
            $stmt->bindParam(6, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /modelo');

        break;

    case 'marca':
        $marca = ucwords(strtolower($_POST['marca']));

        try {
            $stmt = $pdo->prepare("INSERT INTO marcas
                                                VALUES(NULL,?,1)");
            $stmt->bindParam(1, $marca, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /marca');

        break;

    case 'apagar_marca':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM marcas 
                                                WHERE id_marca = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                try {
                    $stmt = $pdo->prepare("UPDATE marcas
                                                SET id_status = 2
                                                WHERE id_marca = ?");
                    $stmt->bindParam(1, $id, PDO::PARAM_INT);
                    $executa = $stmt->execute();

                    if ($executa) {
                        $_SESSION['apagado'] = 1;
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /marca');

        break;

    case 'atualizar_marca':
        $id = $_POST['id'];
        $marca = ucwords(strtolower($_POST['marca']));

        try {
            $stmt = $pdo->prepare("UPDATE marcas
                                                SET descricao = ? 
                                                WHERE id_marca = ?");
            $stmt->bindParam(1, $marca, PDO::PARAM_STR);
            $stmt->bindParam(2, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /marca');

        break;

    case 'login':

        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        try {
            $stmt = $pdo->prepare('SELECT COUNT(*) AS total 
                                                FROM usuarios 
                                                WHERE login = ? 
                                                AND senha = ?
                                                AND id_status != 2');
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $stmt = $pdo->prepare('SELECT id_perfil, nome, id_usuario
                                                FROM usuarios 
                                                WHERE login = ?');
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->execute();

            $resultado1 = $stmt->fetch();

            if ($resultado['total'] > 0) {

                session_start();

                $_SESSION['login'] = $resultado1[1];
                $_SESSION['perfil'] = $resultado1[0];
                $_SESSION['usuario'] = $resultado1[2];
                $_SESSION['temposessao'] = time() + 120;
                
                if ($_SESSION['perfil'] == 1) {
                    header('Location: /percurso');
                }
                if ($_SESSION['perfil'] == 2) {
                    header('Location: /percurso');
                }
                if ($_SESSION['perfil'] == 3) {
                    header('Location: /viaturascadastradas');
                }
                if ($_SESSION['perfil'] == 4) {
                    header('Location: /relatorio');
                }
                if ($_SESSION['perfil'] == 5) {
                    header('Location: /militarescadastrados');
                }
                
            } else {
                session_start();
                $_SESSION['erro'] = 1;
                header('Location: /');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'cadastrar_manutencao':
        $id_viatura = $_POST['viatura'];
        $odometro = $_POST['odometro'];
        $manutencao = $_POST['manutencao'];
        $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

        try {
            $stmt = $pdo->prepare("INSERT INTO manutencao_viaturas
                                                VALUES(NULL,?,?,?,?,$usuario)");
            $stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
            $stmt->bindParam(2, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(3, $manutencao, PDO::PARAM_STR);
            $stmt->bindParam(4, $data, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /manutencaovtr');

        break;

    case 'apagar_manutencao':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM manutencao_viaturas
                                                WHERE id_manutencao_viatura = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /manutencaovtr');

        break;

    case 'atualizar_manutencao':
        $id = $_POST['id'];
        $id_viatura = $_POST['viatura'];
        $odometro = $_POST['odometro'];
        $manutencao = $_POST['manutencao'];
        $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

        try {
            $stmt = $pdo->prepare("UPDATE manutencao_viaturas
                                                SET id_viatura = ?, odometro = ?, descricao = ?, data = ?, id_usuario = $usuario 
                                                WHERE id_manutencao_viatura = ?");
            $stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
            $stmt->bindParam(2, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(3, $manutencao, PDO::PARAM_STR);
            $stmt->bindParam(4, $data, PDO::PARAM_STR);
            $stmt->bindParam(5, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /manutencaovtr');

        break;

    case 'cadastrar_acidente':
        $id_viatura = $_POST['viatura_acidente'];
        $id_motorista = $_POST['motorista'];
        $acompanhante = $_POST['acompanhante'];
        $odometro = $_POST['odometro'];
        $acidente = $_POST['acidente'];
        $avarias = $_POST['avarias'];
        $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

        try {
            $stmt = $pdo->prepare("INSERT INTO acidentes_viaturas
                                                VALUES(NULL,?,?,?,?,?,?,?,$usuario)");
            $stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
            $stmt->bindParam(2, $id_motorista, PDO::PARAM_INT);
            $stmt->bindParam(3, $acompanhante, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $acidente, PDO::PARAM_STR);
            $stmt->bindParam(6, $avarias, PDO::PARAM_STR);
            $stmt->bindParam(7, $data, PDO::PARAM_STR);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /acidentevtr');

        break;

    case 'apagar_acidente':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM acidentes_viaturas
                                                WHERE id_acidente_viatura = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['apagado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /acidentevtr');

        break;

    case 'atualizar_acidente':
        $id = $_POST['id'];
        $id_viatura = $_POST['viatura_acidente'];
        $id_motorista = $_POST['motorista'];
        $acompanhante = $_POST['acompanhante'];
        $odometro = $_POST['odometro'];
        $acidente = $_POST['acidente'];
        $avarias = $_POST['avarias'];
        $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

        try {
            $stmt = $pdo->prepare("UPDATE acidentes_viaturas
                                                SET id_viatura = ?, id_motorista = ?, acompanhante = ?, odometro = ?, descricao = ?, data = ?, avarias = ?, id_usuario = $usuario 
                                                WHERE id_acidente_viatura = ?");
            $stmt->bindParam(1, $id_viatura, PDO::PARAM_INT);
            $stmt->bindParam(2, $id_motorista, PDO::PARAM_INT);
            $stmt->bindParam(3, $acompanhante, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $acidente, PDO::PARAM_STR);
            $stmt->bindParam(6, $data, PDO::PARAM_STR);
            $stmt->bindParam(7, $avarias, PDO::PARAM_STR);
            $stmt->bindParam(8, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if (!$executa) {
                print("<div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Não foi possível acessar a base de dados</strong>
                         </div>");
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /acidentevtr');

        break;

    case 'cadastrar_militar':
        $numero_militar = htmlentities($_POST['numero_militar']);
        $cp = htmlentities($_POST['cp']);
        $grupo = htmlentities($_POST['grupo']);
        $numero_militar = htmlentities($_POST['grupo']);
        $antiguidade = htmlentities($_POST['antiguidade']);
        $data_praca = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_praca'])));
        $nome_completo = htmlentities(ucwords(strtolower($_POST['nome_completo'])));
        $nome = htmlentities(ucwords(strtolower($_POST['nome'])));
        $pg = $_POST['pg'];
        $data_nascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nascimento'])));
        $estado_natal = htmlentities(strtoupper($_POST['estado_natal']));
        $cidade_natal = htmlentities(ucwords(strtolower($_POST['cidade_natal'])));
        $idt_militar = htmlentities($_POST['idt_militar']);
        $rg = htmlentities($_POST['rg']);
        $orgao_expedidor = htmlentities(strtoupper($_POST['orgao_expedidor']));
        $cpf = htmlentities($_POST['cpf']);
        $pai = htmlentities(ucwords(strtolower($_POST['pai'])));
        $mae = htmlentities(ucwords(strtolower($_POST['mae'])));
        $conjuge = htmlentities(ucwords(strtolower($_POST['conjuge'])));
        $data_nascimento_conjuge = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nascimento_conjuge'])));


        $tipo_endereco = htmlentities($_POST['tipo_endereco']);
        $rua = htmlentities($_POST['rua']);
        $bairro = htmlentities($_POST['bairro']);
        $complemento = htmlentities($_POST['complemento']);
        $estado = htmlentities($_POST['estado']);
        $cidade = htmlentities($_POST['cidade']);

        $tipo_telefone = htmlentities($_POST['tipo_telefone']);
        $telefone = htmlentities($_POST['telefone']);

        $email = htmlentities($_POST['email']);

        if (isset($_POST['laranjeira'])) {
            $laranjeira = "Sim";
        } else {
            $laranjeira = "Não";
        }

        try {

            $pdo->beginTransaction();

            $stmt = $pdo->prepare("INSERT INTO militares (id_militar, numero_militar, cp, grupo, antiguidade, data_praca, nome, 
                                                                                         nome_completo, data_nascimento, id_cidade, id_estado, 
                                                                                         idt_militar, rg, orgao_expedidor, cpf, pai, mae, conjuge, data_nascimento_conjuge, 
                                                                                         laranjeira, id_posto_grad, id_status, id_usuario) 
                                                    VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,$usuario )");

            $stmt->bindParam(1, $numero_militar, PDO::PARAM_INT);
            $stmt->bindParam(2, $cp, PDO::PARAM_INT);
            $stmt->bindParam(3, $grupo, PDO::PARAM_INT);
            $stmt->bindParam(4, $antiguidade, PDO::PARAM_INT);
            $stmt->bindParam(5, $data_praca, PDO::PARAM_STR);
            $stmt->bindParam(6, $nome, PDO::PARAM_STR);
            $stmt->bindParam(7, $nome_completo, PDO::PARAM_STR);
            $stmt->bindParam(8, $data_nascimento, PDO::PARAM_STR);
            $stmt->bindParam(9, $cidade_natal, PDO::PARAM_INT);
            $stmt->bindParam(10, $estado_natal, PDO::PARAM_INT);
            $stmt->bindParam(11, $idt_militar, PDO::PARAM_STR);
            $stmt->bindParam(12, $rg, PDO::PARAM_STR);
            $stmt->bindParam(13, $orgao_expedidor, PDO::PARAM_STR);
            $stmt->bindParam(14, $cpf, PDO::PARAM_STR);
            $stmt->bindParam(15, $pai, PDO::PARAM_STR);
            $stmt->bindParam(16, $mae, PDO::PARAM_STR);
            $stmt->bindParam(17, $conjuge, PDO::PARAM_STR);
            $stmt->bindParam(18, $data_nascimento_conjuge, PDO::PARAM_STR);
            $stmt->bindParam(19, $laranjeira, PDO::PARAM_STR);
            $stmt->bindParam(20, $pg, PDO::PARAM_STR);

            $executa = $stmt->execute();

            $stmt = $pdo->prepare("SELECT LAST_INSERT_ID() INTO @ID;");
            $executa = $stmt->execute();


            for ($i = 0; $i < sizeof($rua); $i++) {
                if (empty($tipo_endereco[$i]) && empty($rua[$i]) && empty($bairro[$i]) && empty($cidade[$i]) && empty($estado[$i]) && empty($complemento[$i])) {
                    continue;
                } else {
                    $stmt = $pdo->prepare("INSERT INTO enderecos
                                                VALUES(NULL,@id,?,?,?,?,?,?,1);");
                    $stmt->bindParam(1, htmlentities(ucwords(strtolower($tipo_endereco[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(2, htmlentities(ucwords(strtolower($rua[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(3, htmlentities(ucwords(strtolower($bairro[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(4, htmlentities(ucwords(strtolower($cidade[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(5, htmlentities(ucwords(strtolower($estado[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(6, htmlentities(ucwords(strtolower($complemento[$i]))), PDO::PARAM_STR);
                    $executa = $stmt->execute();
                }
            }



            for ($i = 0; $i < sizeof($tipo_telefone); $i++) {
                if (empty($tipo_telefone[$i]) && empty($telefone[$i])) {
                    continue;
                } else {
                    $stmt = $pdo->prepare("INSERT INTO telefones
                                                VALUES(NULL,@id,?,?,1);");
                    $stmt->bindParam(1, htmlentities(ucwords(strtolower($tipo_telefone[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(2, $telefone[$i], PDO::PARAM_STR);
                    $executa = $stmt->execute();
                }
            }

            for ($i = 0; $i < sizeof($email); $i++) {
                if (empty($email[$i])) {
                    continue;
                } else {
                    $stmt = $pdo->prepare("INSERT INTO emails
                                                VALUES(NULL,@id,?,1);");
                    $stmt->bindParam(1, htmlentities($email[$i]), PDO::PARAM_STR);
                    $executa = $stmt->execute();
                }
            }

            $pdo->commit();

            if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                $_SESSION['cadastrado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /militarescadastrados');

        break;

    case 'atualizar_militar':
        $id_militar = $_POST['id_militar'];
        $numero_militar = $_POST['numero_militar'];
        $cp = $_POST['cp'];
        $grupo = $_POST['grupo'];
        $numero_militar = $_POST['grupo'];
        $antiguidade = $_POST['antiguidade'];
        $data_praca = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_praca'])));
        $nome_completo = htmlentities(ucwords(strtolower($_POST['nome_completo'])));
        $nome = htmlentities(ucwords(strtolower($_POST['nome'])));
        $pg = $_POST['pg'];
        $data_nascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nascimento'])));
        $estado_natal = htmlentities(strtoupper($_POST['estado_natal']));
        $cidade_natal = htmlentities(ucwords(strtolower($_POST['cidade_natal'])));
        $idt_militar = $_POST['idt_militar'];
        $rg = $_POST['rg'];
        $orgao_expedidor = htmlentities(strtoupper($_POST['orgao_expedidor']));
        $cpf = $_POST['cpf'];
        $pai = htmlentities(ucwords(strtolower($_POST['pai'])));
        $mae = htmlentities(ucwords(strtolower($_POST['mae'])));
        $conjuge = htmlentities(ucwords(strtolower($_POST['conjuge'])));
        $data_nascimento_conjuge = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nascimento_conjuge'])));

        $id_enderecos = $_POST['id_enderecos'];
        $tipo_endereco = $_POST['tipo_endereco'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];

        $id_telefones = $_POST['id_telefones'];
        $tipo_telefone = $_POST['tipo_telefone'];
        $telefone = $_POST['telefone'];

        $id_emails = $_POST['id_emails'];
        $email = $_POST['email'];




        if (isset($_POST['laranjeira'])) {
            $laranjeira = "Sim";
        } else {
            $laranjeira = "Não";
        }


        try {

            $stmt = $pdo->prepare("UPDATE  militares 
                                                SET  numero_militar =  ?,
                                                cp =  ?,
                                                grupo =  ?,
                                                antiguidade =  ?,
                                                data_praca =  ?,
                                                nome =  ?,
                                                nome_completo =  ?,
                                                data_nascimento =  ?,
                                                id_cidade =  ?,
                                                id_estado =  ?,
                                                idt_militar =  ?,
                                                rg =  ?,
                                                orgao_expedidor =  ?,
                                                cpf =  ?,
                                                pai =  ?,
                                                mae =  ?,
                                                conjuge =  ?,
                                                data_nascimento_conjuge =  ?,
                                                laranjeira =  ?,
                                                id_posto_grad =  ?
                                                WHERE  id_militar = ?;");
            $stmt->bindParam(1, $numero_militar, PDO::PARAM_INT);
            $stmt->bindParam(2, $cp, PDO::PARAM_INT);
            $stmt->bindParam(3, $grupo, PDO::PARAM_INT);
            $stmt->bindParam(4, $antiguidade, PDO::PARAM_INT);
            $stmt->bindParam(5, $data_praca, PDO::PARAM_STR);
            $stmt->bindParam(6, $nome, PDO::PARAM_STR);
            $stmt->bindParam(7, $nome_completo, PDO::PARAM_STR);
            $stmt->bindParam(8, $data_nascimento, PDO::PARAM_STR);
            $stmt->bindParam(9, $cidade_natal, PDO::PARAM_INT);
            $stmt->bindParam(10, $estado_natal, PDO::PARAM_INT);
            $stmt->bindParam(11, $idt_militar, PDO::PARAM_STR);
            $stmt->bindParam(12, $rg, PDO::PARAM_STR);
            $stmt->bindParam(13, $orgao_expedidor, PDO::PARAM_STR);
            $stmt->bindParam(14, $cpf, PDO::PARAM_STR);
            $stmt->bindParam(15, $pai, PDO::PARAM_STR);
            $stmt->bindParam(16, $mae, PDO::PARAM_STR);
            $stmt->bindParam(17, $conjuge, PDO::PARAM_STR);
            $stmt->bindParam(18, $data_nascimento_conjuge, PDO::PARAM_STR);
            $stmt->bindParam(19, $laranjeira, PDO::PARAM_STR);
            $stmt->bindParam(20, $pg, PDO::PARAM_STR);
            $stmt->bindParam(21, $id_militar, PDO::PARAM_INT);
            $executa = $stmt->execute();

            for ($i = 0; $i < sizeof($tipo_telefone); $i++) {
                if (empty($id_telefones[$i])) {
                    if (empty($tipo_telefone[$i]) && empty($telefone[$i])) {
                        continue;
                    } else {
                        $stmt = $pdo->prepare("INSERT INTO telefones
                                                VALUES(NULL,?,?,?,1);");
                        $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
                        $stmt->bindParam(2, htmlentities(ucwords(strtolower($tipo_telefone[$i]))), PDO::PARAM_STR);
                        $stmt->bindParam(3, $telefone[$i], PDO::PARAM_STR);
                        $executa = $stmt->execute();
                    }
                } else {
                    $stmt = $pdo->prepare("UPDATE telefones
                                                        SET id_militar = ?,
                                                        tipo = ?,
                                                        numero = ?
                                                        WHERE id_telefone = ?");
                    $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
                    $stmt->bindParam(2, htmlentities(ucwords(strtolower($tipo_telefone[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(3, $telefone[$i], PDO::PARAM_STR);
                    $stmt->bindParam(4, $id_telefones[$i], PDO::PARAM_INT);
                    $executa = $stmt->execute();
                }
            }

            for ($i = 0; $i < sizeof($tipo_endereco); $i++) {
                if (empty($id_enderecos[$i])) {
                    if (empty($tipo_endereco[$i]) && empty($rua[$i]) && empty($bairro[$i]) && empty($cidade[$i]) && empty($estado[$i]) && empty($complemento[$i])) {
                        continue;
                    } else {
                        $stmt = $pdo->prepare("INSERT INTO enderecos
                                                VALUES(NULL,?,?,?,?,?,?,?,1);");
                        $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
                        $stmt->bindParam(2, htmlentities(ucwords(strtolower($tipo_endereco[$i]))), PDO::PARAM_STR);
                        $stmt->bindParam(3, htmlentities(ucwords(strtolower($rua[$i]))), PDO::PARAM_STR);
                        $stmt->bindParam(4, htmlentities(ucwords(strtolower($bairro[$i]))), PDO::PARAM_STR);
                        $stmt->bindParam(5, htmlentities(ucwords(strtolower($cidade[$i]))), PDO::PARAM_STR);
                        $stmt->bindParam(6, htmlentities(strtoupper($estado[$i])), PDO::PARAM_STR);
                        $stmt->bindParam(7, htmlentities(ucwords(strtolower($complemento[$i]))), PDO::PARAM_STR);
                        $executa = $stmt->execute();
                    }
                } else {
                    $stmt = $pdo->prepare("UPDATE enderecos
                                                        SET tipo = ?,
                                                        rua = ?,
                                                        bairro = ?,
                                                        cidade = ?,
                                                        estado = ?,
                                                        complemento = ?
                                                        WHERE id_endereco = ?");
                    $stmt->bindParam(1, htmlentities(ucwords(strtolower($tipo_endereco[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(2, htmlentities(ucwords(strtolower($rua[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(3, htmlentities(ucwords(strtolower($bairro[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(4, htmlentities(ucwords(strtolower($cidade[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(5, htmlentities(strtoupper($estado[$i])), PDO::PARAM_STR);
                    $stmt->bindParam(6, htmlentities(ucwords(strtolower($complemento[$i]))), PDO::PARAM_STR);
                    $stmt->bindParam(7, $id_enderecos[$i], PDO::PARAM_INT);
                    $executa = $stmt->execute();
                }
            }

            for ($i = 0; $i < sizeof($email); $i++) {
                if (empty($id_emails[$i])) {
                    if (empty($email[$i])) {
                        continue;
                    } else {
                        $stmt = $pdo->prepare("INSERT INTO emails
                                                VALUES(NULL,?,?,1);");
                        $stmt->bindParam(1, $id_militar, PDO::PARAM_INT);
                        $stmt->bindParam(2, htmlentities($email[$i]), PDO::PARAM_STR);
                        $executa = $stmt->execute();
                    }
                } else {
                    $stmt = $pdo->prepare("UPDATE emails
                                                        SET email = ?
                                                        WHERE id_email= ?");
                    $stmt->bindParam(1, htmlentities($email[$i]), PDO::PARAM_STR);
                    $stmt->bindParam(2, $id_emails[$i], PDO::PARAM_INT);
                    $executa = $stmt->execute();
                }
            }


            if (!$executa) {
                $_SESSION['erro'] = 1;
            } else {
                $_SESSION['atualizado'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /militarescadastrados');

        break;


    case 'apagar_militar':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE militares
                                                SET id_status = 2
                                                WHERE id_militar = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            $stmt = $pdo->prepare("UPDATE usuarios
                                                SET id_status = 2
                                                WHERE id_militar = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();

            if ($executa) {
                $_SESSION['apagado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /militarescadastrados');

        break;

    case 'ativar_militar':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE militares
                                                SET id_status = 1
                                                WHERE id_militar = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
            if ($executa) {
                $_SESSION['ativado'] = 1;
            } else {
                $_SESSION['erro'] = 1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: /militarescadastrados');

        break;

    case 'apagar_telefone':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE telefones
                                                SET id_status = 2
                                                WHERE id_telefone = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'ativar_telefone':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE telefones
                                                SET id_status = 1
                                                WHERE id_telefone = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'apagar_endereco':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE enderecos
                                                SET id_status = 2
                                                WHERE id_endereco = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'ativar_endereco':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE enderecos
                                                SET id_status = 1
                                                WHERE id_endereco = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'apagar_email':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE emails
                                                SET id_status = 2
                                                WHERE id_email = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    case 'ativar_email':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("UPDATE emails
                                                SET id_status = 1
                                                WHERE id_email = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;


    default:
//no action sent
}
unset($_POST, $_GET);
?>
     