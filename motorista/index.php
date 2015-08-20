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
        include "../menu.php";
        include '../sessao.php';
    ?>

       <fieldset>
           <legend>Cadastro de Motorista</legend>
                <table border=2px text-align='center'style='width: 20%'>
                    <form action="../executar.php" method="post">
                        <tr>
                            <td>Nome de Guerra</td>
                            <td><label for="nome"><input autofocus class="form-control" type="text" style='width: 150px' id="nome" name="nome" placeholder="Nome" required="required"/></label></td>
                        </tr>
                        <tr>
                        <td>Posto/Grad</td>
                            <td><label for="pg"><select class="form-control" name="pg">
                                        <?php
                                            include 'relacao_postograd.php';
                                        ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Categoria</td>
                              <td><label for="categoria"><select class="form-control" name="categoria">
                                        <?php
                                            include 'relacao_habilitacao.php';
                                        ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label><button type="submit" class="btn btn-primary" id="enviar" value="motorista" name="enviar">Cadastrar</button></label></td>
                        </tr>
                    </form>
                </table>
       </fieldset>
   </BODY>
</HTML>

<?php
    include 'tabela_motorista_cadastrados.php';
?>