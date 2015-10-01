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
        include("../verificarLogin.php");
        include"../menu.php";
        include "../sessao.php";
        include '../conexao.php';
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("SELECT * FROM recibos_combustiveis WHERE id_recibo_combustivel= $id");
            $executa = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) {
            $id = $reg->id_recibo_combustivel;
            $qnt = $reg->qnt;
            $motivo = $reg->motivo;
        }
        ?>


        <fieldset>
            <legend>Recebimento de Combustível</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../executar.php" method="post">
                    <tr>
                        <td>Combustível</td>
                        <td><label for="combustivel"><select class="form-control" name="combustivel">
                                    <?php
                                    include 'relacao_combustiveis.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td><label for="t"><select class="form-control" name="tp">
                                    <?php
                                    include 'relacao_tipos_combustiveis.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Quantidade</td>
                        <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="<?php echo $qnt ?>"/></label><br /></td>
                    </tr>
                    <tr>
                        <td>Motivo</td>
                        <td><label for="motivo"><input class="form-control" type="text" style='width: 150px' id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" value="<?php echo $motivo ?>"/></label></td>
                    </tr>
                    <tr>
                        <td></td>
                    <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_rcb_comb" name="enviar">Atualizar</button></label></td>
                    </tr>
                </form>
            </table>
        </fieldset>
    </BODY>
</HTML>

<?php
include 'tabela_relacao_rcb_comb.php';
?>