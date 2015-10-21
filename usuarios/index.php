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
        include '../sessao.php';
        ?>
        <form action="../executar.php" method="post">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <table border=2px text-align='center' style='width: 40%'>
                    <tr>
                        <td>Login:</td>
                        <td><label for="login"><input autofocus class="form-control" style="width: 150px"  type="text" name="login" id="login" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><label for="senha"><input class="form-control" style="width: 150px"  type="password" name="senha" id="senha" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Perfil:</td>
                        <td><label for="perfil"><select class="form-control" style="width: 150px"  name="perfil">
                                    <?php
                                    include 'relacao_perfil.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Apelido:</td>
                        <td><label for="apelido"><input autofocus class="form-control" style="width: 150px"  type="text" name="apelido" id="apelido" required="required" placeholder="Como quer ser chamado"/></label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary" value="cadastrar_usuario" name="enviar">Cadastrar Usuário</button></td>
                    </tr>
            </fieldset>
        </form></table>
</body>
</html>

<?php
include "tabela_relacao_usuario.php";
?>