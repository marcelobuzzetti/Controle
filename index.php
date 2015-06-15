<HTML>
   <HEAD>
      <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
      <meta charset="UTF-8"/>
   </HEAD>
   <BODY>
       <fieldset>
           <legend>Controle de Saída</legend>
            <form>
                <label for="viatura">Viatura<input type="text" id="viatura" name="viatura" placeholder="Viatura" required="required"/></label>
                <label for="motorista">Motorista<input type="text" id="motorista" name="motorista" placeholder="Motorista" required="required"/></label>
                <label for="destino">Destino<input type="text" id="destino" name="destino" placeholder="Destino" required="required"/></label>
                <label for="odo_saida">Odometro Saida<input type="text" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required"/></label>
                <label for="acompanhantes">Acompanhantes<input type="text" id="acompanhantes" name="Acompanhantes" placeholder="Acompanhantes" required="required"/></label><br />
                <br /><label><input type="submit" id="enviar" name="Enviar"/></label>
            </form>
       </fieldset>
   </BODY>
</HTML>
<?php
?>

