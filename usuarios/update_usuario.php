<html>
    <head>
        <title>Formulário - Cadastro Usuário</title>
        <script src="../js/jquery.js"></script>
        <link   href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/bootstrap.js"></script>
        <script src="../js/script.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>        
        <?php
        include("../usuario/verificarLogin.php");
        include "../menu.php";
        include "../conexao.php";
        include '../sessao.php';
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = $id");
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) {
            $login = $reg->login;
            $nome = $reg->nome;
        }
        ?>
        <form action="../executar.php" method="post">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <table><div class="campo">
                        <tr>
                            <td><label for="login">Login:</label></td>
                            <td><input autofocus class="form-control" type="text" name="login" id="login" value='<?php echo $login ?>' required="required"/></td>
                        </tr>
                    </div>
                    <div class="campo">
                        <tr>
                            <td><label for="senha">Senha:</label></td>
                            <td><input class="form-control" type="password" name="senha" id="senha" required="required"/></td>
                        </tr>
                    </div>
                    <div class="campo">
                        <tr>
                            <td><label for="perfil">Perfil:</label></td>
                            <td><select class="form-control" name="perfil">
                                    <?php
                                    include 'relacao_perfil.php';
                                    ?>
                                </select></td>
                        </tr>
                    </div>
                    <div class="campo">
                        <tr>
                            <td><label for="login">Apelido:</label></td>
                            <td><input autofocus class="form-control" type="text" name="apelido" id="apelido" required="required" placeholder="Como quer ser chamado" value="<?php echo $nome ?>"/></td>
                        </tr>
                    </div>
                    <div class="campo">
                        <tr>
                        <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                        <td><button type="submit" class="btn btn-primary" value="atualizar_usuario" name='enviar'/>Atualizar</td>
                        </tr>
                    </div>
            </fieldset>
        </form></table>
</body>
</html>

<?php
include "tabela_relacao_usuario.php";
?>