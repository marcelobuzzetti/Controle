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
           <legend>Recebimento de Combustível</legend>
                <table border=2px text-align='center' style='width: 40%'>
                    <form action="../executar.php" method="post">
                        <tr>
                            <td>Combustível</td>
                            <td><label for="tp_comb"><select class="form-control" name="tp_comb">
                                       <?php
                                            include 'relacao_tipo_comb.php';
                                       ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td><label for="tp"><select class="form-control" name="tp">
                                       <?php
                                            include 'relacao_tipo.php';
                                       ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Quantidade</td>
                            <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1"/></label><br /></td>
                        </tr>
                        <tr>
                            <td>Motivo</td>
                            <td><label for="motivo"><input class="form-control" type="text" style='width: 150px' id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required"/></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label><button type="submit" class="btn btn-primary" id="enviar" value="rcb_comb" name="enviar">Cadastrar</button></label></td>
                        </tr>
                    </form>
                </table>
       </fieldset>
   </BODY>
</HTML>

<?php
include 'tabela_relacao_abastecimentos.php';
?>