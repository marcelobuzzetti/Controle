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
        include "verificarLogin.php";
        include"../menu.php";
        include '../sessao.php';
        ?>


        <fieldset>
            <legend>Cadastro de Viatura</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../executar.php" method="post">
                    <tr>
                        <td>Marca</td>
                        <td><label for="marca"><select class="form-control" id="marca" name="marca">
                                    <?php
                                    include 'relacao_marca.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td><label for="modelo"><select class="form-control" id="modelo" name="modelo">
                                    <?php
                                    include 'relacao_modelo.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Placa</td>
                        <td><label for="placa"><input class="form-control" type="text" style='width: 150px' id="placa" name="placa" placeholder="Placa" required="required"/></label><br /></td>
                    </tr>
                    <tr>
                        <td>Odômetro</td>
                        <td><label for="odometro"><input class="form-control" type="number" style='width: 150px' id="odometro" name="odometro" placeholder="Odometro" required="required" step="0.1"/></label></td>
                    </tr>
                    <tr>
                        <td>Situação</td>
                        <td><label for="situacao"><select class="form-control" name="situacao">
                                    <?php
                                    include 'relacao_disponibilidade.php';
                                    ?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label><button type="submit" class="btn btn-primary" id="enviar" value="viatura" name="enviar">Cadastrar</button></label></td>
                    </tr>
                </form>
            </table>
        </fieldset>
    </BODY>
</HTML>

<?php
include 'tabela_vtr_cadastradas.php';
?>