<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
        <title>Sistema</title>
    </head>
    <body>
        <form class="form-inline" action="usuario/fazerLogin.php" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
            </div>
            <button type="submit" value="Enviar"class="btn btn-default">Login</button>
        </form>        
    </body>
</html>
<?php
    include 'tabela_relacao_vtr.php';
?>