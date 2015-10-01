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
        <?php
        session_start();
        if ($_SESSION['erro'] == 1) {
            echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Usuário e/ou Senha não cadastrados</strong>
                         </div>";
        }
        if ($_SESSION['timeout'] == 1) {
            echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Realizar o Login</strong>
                         </div>";
        }
        session_destroy();
        ?>
        <form class="form-inline" action="usuarios/fazerLogin.php" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input autofocus type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
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