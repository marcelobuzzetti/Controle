<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <script src="../../js/jquery.js"></script>
        <link   href="../../css/bootstrap.css" rel="stylesheet">
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/jquery.js"></script>
        <script src="../../js/jquery-ui.js"></script>
        <script src="../../js/script.js"></script>

        <script>
            $(function () {
                $("#destino").autocomplete({
                    source: "buscador.php",
                    minLength: 3
                });
            });
        </script>

    </HEAD>
    <BODY>
       <fieldset>
            <legend>Controle de Saída de Viatura</legend>
            <table class="table" text-align='center' style='width: 100%'>
                <tr>
                    <td>Viatura - Placa</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante</td>
                    <td></td>
                </tr>
                <tr>
                <form autocomplete="off" action="../executar.php" method="post">
                    <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                <?php
                                include 'relacao_vtr.php';
                                ?>
                            </select></label></td>
                    <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                                <?php
                                include 'relacao_motorista.php';
                                ?>
                            </select></label></td>
                    <td><label for="destino"><input class="form-control" type="text" style='width: 150px' id="destino" name="destino" placeholder="Destino" required="required"/></label><br /></td>
                    <td><label for="odo_saida"><input class="form-control" type="number" style='width: 150px' id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1"/></label></td>
                    <td><label for="acompanhante"><input class="form-control" type="text" style='width: 150px' id="acompanhante" name="acompanhante" placeholder="Acompanhante" required="required"/></label></td>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="Cadastrar" name="enviar">Cadastrar</button></label></td>
                    </tr>
            </table>
        </form>
    </fieldset>
        <table class='table'>
                 <caption>Viaturas Rodando</caption>
                    <tr>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Ch Vtr</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>
               {foreach $tabela_relacao_vtr as $vtr}
                    <tr>
                        <td>{$vtr.viatura}</td>
                        <td>{$vtr.apelido}</td>
                        <td>{$vtr.destino}</td>
                        <td>{$vtr.odo_saida}</td>
                        <td>{$vtr.ch_vtr}</td>
                        <td>{$vtr.data_saida}</td>
                        <td>{$vtr.hora_saida}</td>
                    </tr>
                {/foreach}    
         </table>  
         <table class='table'>
                 <caption>Viaturas Fechadas</caption>
                    <tr>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Ch Vtr</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>
               {foreach $tabela_relacao_vtr_fechadas as $vtr}
                    <tr>
                        <td>{$vtr.viatura}</td>
                        <td>{$vtr.apelido}</td>
                        <td>{$vtr.destino}</td>
                        <td>{$vtr.odo_saida}</td>
                        <td>{$vtr.ch_vtr}</td>
                        <td>{$vtr.data_saida}</td>
                        <td>{$vtr.hora_saida}</td>
                    </tr>
                {/foreach}    
         </table>  
</BODY>
</HTML>