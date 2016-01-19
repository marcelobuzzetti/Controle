<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table table-responsive" >
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
                                <td><select class="form-control" name="viatura" id="viatura" required="required" tabindex="1">
                                            <option value='' disabled selected>Selecione a Viatura</option>
                                            {foreach $relacao_viaturas as $viatura}
                                                <option value={$viatura.id_viatura}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                                            {/foreach}
                                        </select></td>
                                        <td><select class="form-control" name="motorista" id="motorista" required="required" tabindex="2">
                                            <option value='' class="Selecione" disabled selected>Selecione a Viatura</option>
                                    </select>
                                </td>
                                <td><input class="form-control" type="text" id="destino" name="destino" placeholder="Destino" required="required" maxlength="20" tabindex="3"/><br /></td>
                                <td><input class="form-control" type="number" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1" min="0" max="999999" tabindex="4"/></td>
                                <td><input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante" maxlength="20" tabindex="5"/></td>
                                <td><button type="submit" class="btn btn-primary" id="enviar" value="Cadastrar" name="enviar" tabindex="6">Cadastrar</button></td>
                            </tr>
                        </form>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table table-responsive" >
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
                                <td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required'  step="0.1" min="{$tbl.odo_saida}"/></td>
                                <td><input class='btn btn-success' type='submit' id='retornou' name='enviar' value='Retornou'/></form></td>
                            <form action='executar' method='post'>
                                <input type='hidden' id="{$tbl.id_percurso}"value="{$tbl.id_percurso}" name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value="Apagar" onclick='preenche({$contador},{$tbl.id_percurso})'/><span class='glyphicon glyphicon-remove'/></form></td>";
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
    <div class='container'>
        <button class="btn btn-info" data-toggle="collapse" data-target="#fechadas">Viaturas Fechadas</button>
        <div id="fechadas" class="collapse">
            <div class="table table-responsive" >
                <fieldset>
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