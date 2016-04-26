
<div class='container'>
    <div class="jumbotron">
        <h1>Controle de Saída de Viatura</h1>      
        <form autocomplete="off" action="executar" method="post">
            <div class="form-group col-xs-12 col-sm-6 col-md-3">
                <label for="viatura">Viatura - Placa</label>
                <select class="form-control" name="viatura" id="viatura" required="required" tabindex="1">
                    <option value='' disabled selected>Selecione a Viatura</option>
                    {foreach $relacao_viaturas as $viatura}
                        <option value={$viatura.id_viatura}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-3">
                <label for="motorista">Motorista</label>
                <select class="form-control" name="motorista" id="motorista" required="required" tabindex="2">
                    <option value='' class="Selecione" disabled selected>Selecione a Viatura</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-2">
                <label for="destino">Destino</label>
                <input class="form-control" type="text" id="destino" name="destino" placeholder="Destino" required="required" maxlength="20" tabindex="3"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-2">
                <label for="odo_saida">Odômetro Saída</label>
                <input class="form-control" type="number" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1" min="0" tabindex="4"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-2">
                <label for="acompanhante">Acompanhante</label>
                <input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante" maxlength="20" tabindex="5"/>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="percurso" name="enviar" tabindex="6">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O percurso foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi fechada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O percurso foi apagado com sucesso!
        </div>              
    {/if}
</div>
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
                            <td><button class='btn btn-success' type='submit' id='retornou' name='enviar' value='percurso_retornou'/>Retornou</form></td>
                        <form action='executar' method='post'>
                            <input type='hidden' id="{$tbl.id_percurso}"value="{$tbl.id_percurso}" name='id'/>
                            <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value="Apagar" onclick='preenche({$contador},{$tbl.id_percurso})'/><span class='glyphicon glyphicon-remove'/></form></td>
                        </tr>
                        </form>
                        </tr>
                    {/foreach}    
                </table>
            </fieldset>
        </div>
    </div>
</div>
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