<HTML>
   <HEAD>
      <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
      <meta charset="UTF-8"/>
      <link   href="css/bootstrap.css" rel="stylesheet">
      <script src="js/bootstrap.min.js"></script>
   </HEAD>
   <BODY>
       <fieldset>
           <legend>Controle de Saída</legend>
            <form action="inserir.php" method="post">
                <table border=2px text-align='center'>
                    <tr>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odomêntro Saída</td>
                        <td>Acompanhantes</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="viatura"><input type="text" id="viatura" name="viatura" placeholder="Viatura" required="required"/></label></td>
                        <td><label for="motorista"><input type="text" id="motorista" name="motorista" placeholder="Motorista" required="required"/></label></td>
                        <td><label for="destino"><input type="text" id="destino" name="destino" placeholder="Destino" required="required"/></label><br /></td>
                        <td><label for="odo_saida"><input type="text" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required"/></label></td>
                        <td><label for="acompanhantes"><input type="text" id="acompanhantes" name="acompanhantes" placeholder="Acompanhantes" required="required"/></label></td>
                        <td><label><input type="submit" id="enviar" name="Enviar"/></label></td>
                    </tr>
                </table>
            </form>
       </fieldset>
   </BODY>
</HTML>

<?php
include 'tabela_relacao_vtr.php';
?>