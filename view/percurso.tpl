<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table' text-align='center'>
                        <form autocomplete="off" action="executar" method="post">
                            <tr>
                                <td>Viatura - Placa</td>
                                <td>Motorista</td>
                                <td>Destino</td>
                                <td>Odômetro Saída</td>
                                <td>Acompanhante</td>
                                <td></td>
                            </tr>
                            <tr>
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
                                <td><label for="destino"><input class="form-control" type="text" id="destino" name="destino" placeholder="Destino" required="required"/></label><br /></td>
                                <td><label for="odo_saida"><input class="form-control" type="number" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1"/></label></td>
                                <td><label for="acompanhante"><input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante"/></label></td>
                                <td><label><button type="submit" class="btn btn-primary" id="enviar" value="Cadastrar" name="enviar">Cadastrar</button></label></td>
                            </tr>
                        </form>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Viaturas Rodando</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Viatura</td>
                            <td>Motorista</td>
                            <td>Destino</td>
                            <td>Odômetro Saída</td>
                            <td>Acompanhante</td>
                            <td>Data Saída</td>
                            <td>Hora Saída</td>
                            <td>Odômetro Chegada</td>
                            <td colspan="2">Ações</td> 
                        </tr>
                        {foreach $tabela_relacao_vtr as $tbl name=relacao_vtr}
                            <tr><form action='executar' method='post' id="{$contador}">
                                <input type='hidden' readonly='readonly' name='id' id="{$contador}" value="{$tbl.id_percurso}"/>
                                <td>{$smarty.foreach.relacao_vtr.iteration}</td>
                                <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                                <td>{$tbl.apelido}</td>
                                <td>{$tbl.nome_destino}</td>
                                <td>{$tbl.odo_saida}</td>
                                <td>{$tbl.acompanhante}</td>
                                <td>{$tbl.data_saida}</td>
                                <td>{$tbl.hora_saida}</td>
                                <td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required' min="{$vtr.odo_saida}"/></td>
                                <td><input class='btn btn-success' type='submit' id='retornou' name='enviar' value='Retornou'/></form></td>
                            <form action='executar' method='post'>
                                <input type='hidden' id="{$tbl.id_percurso}"value="{$tbl.id_percurso}" name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' onclick='preenche({$contador},{$vtr.id_percurso})'/><span class='glyphicon glyphicon-remove'/></form></td>";
                            </tr>
                            </form>
                            </tr>
                        {/foreach}    
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Viaturas Fechadas</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
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
                        {foreach $tabela_relacao_vtr_fechadas as $tbl1 name=relacao_vtr_fechadas}
                            <tr>
                                <td>{$smarty.foreach.relacao_vtr_fechadas.iteration}</td>
                                <td>{$tbl1.marca} - {$tbl1.modelo} - {$tbl1.placa}</td>
                                <td>{$tbl1.apelido}</td>
                                <td>{$tbl1.nome_destino}</td>
                                <td>{$tbl1.odo_saida}</td>
                                <td>{$tbl1.acompanhante}</td>
                                <td>{$tbl1.data_saida}</td>
                                <td>{$tbl1.hora_saida}</td>
                                <td>{$tbl1.odo_retorno}</td>
                                <td>{$tbl1.data_retorno}</td>
                                <td>{$tbl1.hora_retorno}</td>
                            </tr>
                        {/foreach}    
                    </table>  
                </fieldset>
            </div>
        </div>
    </div>
</div>
</BODY>
</HTML>