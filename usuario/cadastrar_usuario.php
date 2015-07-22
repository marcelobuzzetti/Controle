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
    include("verificarLogin.php");
    include"../menu.php";
?>
        <form action="salvarUsuario.php" method="post">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <table><div class="campo">
                        <tr>
                            <td><label for="login">Login:</label></td>
                            <td><input autofocus class="form-control" type="text" name="login" id="login" required="required"/></td>
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
                        <td><input type="submit" class="btn btn-primary" value="Cadastrar" /></td>
                    </tr>
                </div>
            </fieldset>
            </form></table>
    </body>
</html>

<?php
    include "tabela_relacao_usuario.php";
?>