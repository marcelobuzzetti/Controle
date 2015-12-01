<?php

include $_SERVER['DOCUMENT_ROOT'].constant("PATH").'/include/config.inc.php';

switch ($_POST['enviar']) {

    case 'Retornou':
        $id = $_POST['id'];
        $odo_retorno = $_POST['odo_retorno'];

        try {
            $stmt = $pdo->prepare("UPDATE percursos 
                                                SET odo_retorno=$odo_retorno, data_retorno=NOW(), hora_retorno=NOW() 
                                                WHERE id_percurso=" . $id);
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

        header('Location: '.constant("HOST").'/controller/percurso.php');

        break;

    case 'Apagar':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM percursos
                                                WHERE id_percurso=" . $id);
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

        header('Location: '.constant("HOST").'/controller/percurso.php');

        break;

    case 'Cadastrar':
        $viatura = $_POST["viatura"];
        $nome = $_POST["motorista"];
        $destino = mb_strtoupper($_POST["destino"]);
        $odometro = $_POST["odo_saida"];
        $acompanhante = mb_strtoupper($_POST["acompanhante"]);

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
                                                VALUES(NULL,?,?,?,?,?,NOW(),NOW(),NULL,NULL,NULL)");
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
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('Location: '.constant("HOST").'/controller/percurso.php');

        break;

    case 'viatura':
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $placa = mb_strtoupper($_POST["placa"]);
        $odometro = $_POST["odometro"];
        $situacao = $_POST["situacao"];
        
        try {
            $stmt = $pdo->prepare("INSERT INTO viaturas 
                                                VALUES(NULL,?,?,?,?,?)");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_INT);
            $stmt->bindParam(3, $placa, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $situacao, PDO::PARAM_INT);
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

       header('Location: '.constant("HOST").'/controller/viatura.php');

        break;

    case 'apagar_viatura':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM viaturas
                                                WHERE id_viatura=" . $id);
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

       header('Location: '.constant("HOST").'/controller/viatura.php');

        break;

    case 'atualizar_viatura':
        $id = $_POST['id'];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $placa = mb_strtoupper($_POST["placa"]);
        $odometro = $_POST["odometro"];
        $situacao = $_POST["situacao"];



        try {
            $stmt = $pdo->prepare("UPDATE viaturas
                                                SET id_marca = ?, id_modelo = ?, placa = ?, odometro = ?, id_situacao = ?
                                                WHERE id_viatura = ?");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_INT);
            $stmt->bindParam(3, $placa, PDO::PARAM_STR);
            $stmt->bindParam(4, $odometro, PDO::PARAM_STR);
            $stmt->bindParam(5, $situacao, PDO::PARAM_INT);
            $stmt->bindParam(6, $id, PDO::PARAM_INT);
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

       header('Location: '.constant("HOST").'/controller/viatura.php');

        break;

    case 'motorista':
        $nome = mb_strtoupper($_POST['nome']);
        $categoria = $_POST['categoria'];
        $pg = $_POST['pg'];



        try {

            $stmt = $pdo->prepare("SELECT sigla
                                                FROM posto_grad 
                                                WHERE id_posto_grad = ?");
            $stmt->bindParam(1, $pg, PDO::PARAM_INT);
            $executa = $stmt->execute();
            $sigla = $stmt->fetch();
            $apelido = $sigla[0] . " " . $nome;

            $stmt = $pdo->prepare("INSERT INTO motoristas
                                                VALUES(NULL,?,?,?,?)");
            $stmt->bindParam(1, $nome, PDO::PARAM_STR);
            $stmt->bindParam(2, $categoria, PDO::PARAM_INT);
            $stmt->bindParam(3, $pg, PDO::PARAM_INT);
            $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
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

header('Location: '.constant("HOST").'/controller/motorista.php');

        break;

    case 'atualizar_motorista':
        $id = $_POST['id'];
        $nome = mb_strtoupper($_POST['nome']);
        $categoria = $_POST['categoria'];
        $pg = $_POST['pg'];


        try {

            $stmt = $pdo->prepare("SELECT sigla 
                                                FROM posto_grad 
                                                WHERE id_posto_grad = ?");
            $stmt->bindParam(1, $pg, PDO::PARAM_INT);
            $executa = $stmt->execute();
            $sigla = $stmt->fetch();
            $apelido = $sigla[0] . " " . $nome;

            $stmt = $pdo->prepare("UPDATE motoristas
                                                SET nome = ?, id_habilitacao = ?, id_posto_grad = ?, apelido = ?
                                                WHERE id_motorista = ?");
            $stmt->bindParam(1, $nome, PDO::PARAM_STR);
            $stmt->bindParam(2, $categoria, PDO::PARAM_INT);
            $stmt->bindParam(3, $pg, PDO::PARAM_INT);
            $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
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

header('Location: '.constant("HOST").'/controller/motorista.php');

        break;


    case 'Apagar Motorista':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM motoristas
                                                WHERE id_motorista= ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/motorista.php');

        break;

    case 'cadastrar_usuario':

        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $perfil = $_POST['perfil'];
        $apelido = mb_strtoupper($_POST['apelido']);

        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios 
                                                VALUES(NULL,?,?,?,?)");
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->bindParam(3, $perfil, PDO::PARAM_INT);
            $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
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

header('Location: '.constant("HOST").'/controller/usuario.php');

        break;

    case 'apagar_usuario':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM usuarios 
                                                WHERE id_usuario=" . $id);
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

header('Location: '.constant("HOST").'/controller/usuario.php');

        break;

    case 'atualizar_usuario':
        $id = $_POST['id'];
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        $perfil = $_POST['perfil'];
        $apelido = mb_strtoupper($_POST['apelido']);


        try {
            $stmt = $pdo->prepare("UPDATE usuarios
                                                SET login = ?, senha = ?, id_perfil = ?, nome = ?
                                               WHERE id_usuario = ?");
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->bindParam(3, $perfil, PDO::PARAM_INT);
            $stmt->bindParam(4, $apelido, PDO::PARAM_STR);
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

header('Location: '.constant("HOST").'/controller/usuario.php');

        break;

    case 'combustivel':
        $descricao = mb_strtoupper($_POST['descricao']);


        try {
            $stmt = $pdo->prepare("INSERT INTO combustiveis
                                                VALUES(NULL,?)");
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

        header('Location: ../combustiveis/');

        break;

    case 'apagar_combustivel':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM combustiveis
                                                WHERE id_combustivel =" . $id);
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

header('Location: '.constant("HOST").'/controller/combustivel.php');

        break;

    case 'atualizar_combustivel':
        $id = $_POST['id'];
        $descricao = mb_strtoupper($_POST['descricao']);

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
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

header('Location: '.constant("HOST").'/controller/combustivel.php');

        break;

    case 'tipo':
        $descricao = mb_strtoupper($_POST['descricao']);


        try {
            $stmt = $pdo->prepare("INSERT INTO tipos_combustiveis
                                                VALUES(NULL,?)");
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

header('Location: '.constant("HOST").'/controller/tipocombustivel.php');

        break;

    case 'apagar_tipo':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM tipos_combustiveis
                                                WHERE id_tipo_combustivel= ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/tipocombustivel.php');
        break;

    case 'atualizar_tipo':
        $id = $_POST['id'];
        $descricao = mb_strtoupper($_POST['descricao']);

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

header('Location: '.constant("HOST").'/controller/tipocombustivel.php');
        break;

    case 'rcb_comb':
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];
        $motivo = mb_strtoupper($_POST['motivo']);


        try {
            $stmt = $pdo->prepare("INSERT INTO recibos_combustiveis
                                                VALUES(NULL,?,?,?,?,NOW(),NOW())");
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

header('Location: '.constant("HOST").'/controller/recebimentocombustivel.php');

        break;

    case 'apagar_rcb_comb':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM recibos_combustiveis
                                                WHERE id_recibo_combustivel = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/recebimentocombustivel.php');

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

header('Location: '.constant("HOST").'/controller/recebimentocombustivel.php');

        break;

    case 'abst':
        $nrvale = $_POST['nrvale'];
        $motorista = $_POST['motorista'];
        $viatura = $_POST['viatura'];
        $combustivel = $_POST['combustivel'];
        $tp = $_POST['tp'];
        $qnt = $_POST['qnt'];


        try {
            $stmt = $pdo->prepare("INSERT INTO abastecimentos
                                               VALUES(NULL,?,?,?,?,?,?,NOW(),NOW())");
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
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

header('Location: '.constant("HOST").'/controller/abastecimento.php');

        break;

    case 'apagar_abst':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM abastecimentos
                                                WHERE id_abastecimento =" . $id);
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

header('Location: '.constant("HOST").'/controller/abastecimento.php');

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
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

header('Location: '.constant("HOST").'/controller/abastecimento.php');

        break;

    case 'cadastrar_modelo':
        $marca = $_POST['marca'];
        $modelo = mb_strtoupper($_POST['modelo']);
        $cap_tanque = $_POST['cap_tanque'];
        $consumo_padrao = $_POST['consumo_padrao'];
        $cap_transp = $_POST['cap_transp'];
        $id_habilitacao = $_POST['habilitacao'];


        try {
            $stmt = $pdo->prepare("INSERT INTO modelos
                                                VALUES(NULL,?,?,?,?,?,?)");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
            $stmt->bindParam(3, $cap_tanque, PDO::PARAM_INT);
            $stmt->bindParam(4, $consumo_padrao, PDO::PARAM_INT);
            $stmt->bindParam(5, $cap_transp, PDO::PARAM_INT);
            $stmt->bindParam(6, $id_habilitacao, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/modelo.php');

        break;

    case 'apagar_modelo':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM modelos
                                                WHERE id_modelo = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/modelo.php');

        break;

    case 'atualizar_modelo':
        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = mb_strtoupper($_POST['modelo']);
        $cap_tanque = $_POST['cap_tanque'];
        $consumo_padrao = $_POST['consumo_padrao'];
        $cap_transp = $_POST['cap_transp'];
        $id_habilitacao = $_POST['habilitacao'];

        try {
            $stmt = $pdo->prepare("UPDATE modelos
                                                SET id_marca = ?, descricao = ?, cap_tanque = ?, consumo_padrao = ?, cap_transp = ?, id_habilitacao = ? 
                                                WHERE id_modelo = ?");
            $stmt->bindParam(1, $marca, PDO::PARAM_INT);
            $stmt->bindParam(2, $modelo, PDO::PARAM_STR);
            $stmt->bindParam(3, $cap_tanque, PDO::PARAM_INT);
            $stmt->bindParam(4, $consumo_padrao, PDO::PARAM_INT);
            $stmt->bindParam(5, $cap_transp, PDO::PARAM_INT);
            $stmt->bindParam(6, $id_habilitacao, PDO::PARAM_INT);
            $stmt->bindParam(7, $id, PDO::PARAM_INT);
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

header('Location: '.constant("HOST").'/controller/modelo.php');

        break;

    case 'marca':
        $marca = mb_strtoupper($_POST['marca']);

        try {
            $stmt = $pdo->prepare("INSERT INTO marcas
                                                VALUES(NULL,?)");
            $stmt->bindParam(1, $marca, PDO::PARAM_STR);
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

header('Location: '.constant("HOST").'/controller/marca.php');

        break;

    case 'apagar_marca':
        $id = $_POST['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM marcas 
                                                WHERE id_marca =" . $id);
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

header('Location: '.constant("HOST").'/controller/marca.php');

        break;

    case 'atualizar_marca':
        $id = $_POST['id'];
        $marca = mb_strtoupper($_POST['marca']);

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
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

header('Location: '.constant("HOST").'/controller/marca.php');

        break;

    case 'login':

        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        try {
            $stmt = $pdo->prepare('SELECT COUNT(*) AS total 
                                                FROM usuarios 
                                                WHERE login = ? AND senha = ?');
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->bindParam(2, $senha, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $stmt = $pdo->prepare('SELECT id_perfil, nome 
                                                FROM usuarios 
                                                WHERE login = ?');
            $stmt->bindParam(1, $login, PDO::PARAM_STR);
            $stmt->execute();

            $resultado1 = $stmt->fetch();

            if ($resultado['total'] > 0) {

                session_start();

                $_SESSION['login'] = $resultado1[1];
                $_SESSION['perfil'] = $resultado1[0];
                $_SESSION['temposessao'] = time() + 120;

            header('Location: '.constant("HOST").'/controller/percurso.php');
            } else {
                session_start();
                $_SESSION['erro'] = 1;
                header('Location: ../');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        break;

    default:
    //no action sent
}
?>
