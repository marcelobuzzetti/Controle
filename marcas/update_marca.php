<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <script src="../js/jquery.js"></script>
        <link   href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/bootstrap.js"></script>
        <script src="../js/script.js"></script>

    </HEAD>
    <BODY>
        <?php
        include "../verificarLogin.php";
        include"../menu.php";
        include"../sessao.php";
        include '../conexao.php';
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM marcas WHERE id_marca = $id");
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) {
            $id = $reg->id_marca;
            $descricao = $reg->descricao;
        }
        ?>


        <fieldset>
            <legend>Atualizar Marcas</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../executar.php" method="post">
                    <tr>
                        <td>Marcas</td>
                        <td><label for="marca"><input autofocus class="form-control" type="text" style='width: 150px' id="marca" name="marca" placeholder="Marca" required="required" value="<?php echo $descricao ?>"/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_marca" name="enviar">Atualizar Marca</button></label></td>
                    </tr>
                </form>
            </table>
        </fieldset>
    </BODY>
</HTML>

<?php
include 'tabela_marcas_cadastradas.php';
?>