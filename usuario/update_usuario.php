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
     $id = $_POST['id'];
    try{
       $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = $id");
       $executa = $stmt->execute();
    }catch(PDOException $e){
		echo $e->getMessage();
                
    }
    while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
    $login = $reg->login;
    }
?>
?>
        <form action="../executar.php" method="post">
            <fieldset>
                <legend>Cadastro de Usuário</legend>
                <table><div class="campo">
                        <tr>
                            <td><label for="login">Login:</label></td>
                            <td><input class="form-control" type="text" name="login" id="login" value='<?php echo $login ?>'/></td>
                        </tr>
                </div>
                <div class="campo">
                    <tr>
                        <td><label for="senha">Senha:</label></td>
                        <td><input class="form-control" type="password" name="senha" id="senha" /></td>
                    </tr>
                </div>
                <div class="campo">
                    <tr>
                        <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                        <td><button type="submit" value="atualizar_usuario" name='enviar'/>Atualizar</td>
                    </tr>
                </div>
            </fieldset>
            </form></table>
    </body>
</html>

<?php
    include "tabela_relacao_usuario.php";
?>