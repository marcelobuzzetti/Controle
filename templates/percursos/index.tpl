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
                <form autocomplete="off" action="../../configs/executar.php" method="post">
                    <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                <option value='' disabled selected>Selecione a Viatura</option>
                                {foreach $relacao_viaturas as $viatura}
                                    <option value={$viatura.id_viatura}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                                {/foreach}
                            </select></label></td>
                    <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                                <option value='' disabled selected>Selecione o Motorista</option>
                                {foreach $relacao_motoristas as $motorista}
                                    <option value={$motorista.id_motorista}>{$motorista.apelido}</option>
                                {/foreach}   
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
            <td>Odômetro Chegada</td>
            <td></td>
            <td></td> 
        </tr>
        {foreach $tabela_relacao_vtr as $vtr}
            <tr><form action='../../configs/executar.php' method='post' id="{$contador}">
                <input type='hidden' style='width: 40px;text-align: right;border: 0px' readonly='readonly' name='id' id="{$contador}" value="{$vtr.id_percurso}"/>
                <td>{$vtr.marca} - {$vtr.modelo} - {$vtr.placa}</td>
                <td>{$vtr.apelido}</td>
                <td>{$vtr.nome_destino}</td>
                <td>{$vtr.odo_saida}</td>
                <td>{$vtr.acompanhante}</td>
                <td>{$vtr.data_saida}</td>
                <td>{$vtr.hora_saida}</td>
                <td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required' min="{$vtr.odo_saida}" style='width: 120px;'/></td>
                <td><input class='btn btn-success' type='submit' id='retornou' name='enviar' value='Retornou'/></form></td>
        <form action='../../configs/executar.php' method='post'>
            <input type='hidden' id="{$vtr.id_percurso}"value="{$vtr.id_percurso}" name='id'/>
            <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar' onclick='preenche({$contador},{$vtr.id_percurso})'/></form></td>";
</tr></form>
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
        <td>Odômetro Retorno</td>
        <td>Data Chegada</td>
        <td>Hora Chegada</td>
    </tr>
    {foreach $tabela_relacao_vtr_fechadas as $vtr}
        <tr>
            <td>{$vtr.marca} - {$vtr.modelo} - {$vtr.placa}</td>
            <td>{$vtr.apelido}</td>
            <td>{$vtr.nome_destino}</td>
            <td>{$vtr.odo_saida}</td>
            <td>{$vtr.acompanhante}</td>
            <td>{$vtr.data_saida}</td>
            <td>{$vtr.hora_saida}</td>
            <td>{$vtr.odo_retorno}</td>
            <td>{$vtr.data_retorno}</td>
            <td>{$vtr.hora_retorno}</td>
        </tr>
    {/foreach}    
</table>  
</BODY>
</HTML>