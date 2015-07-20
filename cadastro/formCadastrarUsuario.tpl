<!DOCTYPE html>
<html>
    <head>
        <title>Formulário - Cadastro Usuário</title>
        <meta charset="UTF-8">
		<script src="js/jquery.js"></script>
		<link   href="css/bootstrap.css" rel="stylesheet">
		<script src="js/bootstrap.js"></script>
    </head>
    <body>        
        <form action="salvarUsuario.php" method="post">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <div class="campo">
                    <label for="login">Login:</label>
                    <input type="text" name="login" id="login" />
                </div>
                <div class="campo">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" />            
                </div>
                <div class="campo">
                    <input type="submit" value="Gravar" />
                </div>
            </fieldset>
        </form>
    </body>
</html>