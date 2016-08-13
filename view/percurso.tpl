<!--Modal-->
<div class="modal fade" id="modalpercurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Percurso?
                <div class="nome">
                    <div class="input-group">
                        <div class="input-group-addon">Motorista</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="vtr">
                    <div class="input-group">
                        <div class="input-group-addon">Viatura</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="destino">
                    <div class="input-group">
                        <div class="input-group-addon">Destino</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="Apagar">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Nao</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
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
    <div class="jumbotron">
        <h1>Controle de Saída de Viatura</h1>     
    </div>
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
            <input class="form-control" type="text" id="destino" name="destino" placeholder="Destino" required="required" maxlength="30" tabindex="3"/>
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
<div class='container table-responsive grafico'>
    <legend>Viaturas Rodando</legend>
    <table class='table table-striped table-hover' text-align='center'>
        <tr>
            <td>Ordem</td>
            <td>Viatura</td>
            <td>Motorista</td>
            <td>Destino</td>
            <td>Odômetro Saída</td>
            <td>Acompanhante</td>
            <td>Data e Hora da Saída</td>
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
                <td>{$tbl.data_saida} {$tbl.hora_saida}</td>
                <td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required'  step="0.1" min="{$tbl.odo_saida}"/></td>
                <td><button class='btn btn-success' type='submit' id='retornou' name='enviar' value='percurso_retornou'/>Retornou</form></td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalpercurso" data-whatever="{$tbl.id_percurso}" data-destino="{$tbl.nome_destino}" data-nome="{$tbl.apelido}" data-vtr="{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}"><span class='glyphicon glyphicon-remove'/></button></td>
            </tr>
        {/foreach}    
    </table>
</fieldset>
</div>
<div class='container tabela'>
    <legend>Viaturas Rodando</legend>
    <table class='table table-striped table-hover' text-align='center'>
        {foreach $tabela_relacao_vtr as $tbl name=relacao_vtr}
            <tr><form action='executar' method='post' id="{$contador}">
                <input type='hidden' readonly='readonly' name='id' id="{$contador}" value="{$tbl.id_percurso}"/>
                <td>Ordem {$smarty.foreach.relacao_vtr.iteration}</td>
                </tr>
                <tr>
                    <td>Viatura {$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                </tr>
                <tr>
                    <td>Motorista {$tbl.apelido}</td>
                </tr>
                <tr>
                    <td>Destino {$tbl.nome_destino}</td>
                </tr>
                <tr>
                    <td>Odômetro Saída {$tbl.odo_saida}</td>
                </tr>
                <tr>
                    <td>Acompanhante {$tbl.acompanhante}</td>
                </tr>
                <tr>
                    <td>Data e Hora da Saída {$tbl.data_saida} {$tbl.hora_saida}</td>
                </tr>
                <tr>
                    <td>Odômetro Chegada <input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required'  step="0.1" min="{$tbl.odo_saida}"/></td>
                </tr>
                <tr>
                    <td>Ações</td> 
                </tr>
                <tr>
                    <td><button class='btn btn-success col-xs-12 col-sm-12 col-md-12' type='submit' id='retornou' name='enviar' value='percurso_retornou'/>Retornou</td></form>
                </tr>
                <tr>
                   <td><button type="button" class="btn btn-danger col-xs-12 col-sm-12 col-md-12" data-toggle="modal" data-target="#modalpercurso" data-whatever="{$tbl.id_percurso}" data-destino="{$tbl.nome_destino}" data-nome="{$tbl.apelido}" data-vtr="{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}"><span class='glyphicon glyphicon-remove'/></button></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
        {/foreach}    
    </table>
</fieldset>
</div>
<div class="container">
    <legend>10 últimas viaturas fechadas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante</td>
                <td>Data e Hora da Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data e Hora da Chegada</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_relacao_vtr_fechadas as $tbl1 name=relacao_vtr_fechadas}
                <tr>
                    <td>{$tbl1.marca} - {$tbl1.modelo} - {$tbl1.placa}</td>
                    <td>{$tbl1.apelido}</td>
                    <td>{$tbl1.nome_destino}</td>
                    <td>{$tbl1.odo_saida}</td>
                    <td>{$tbl1.acompanhante}</td>
                    <td>{$tbl1.data_saida} {$tbl1.hora_saida}</td>
                    <td>{$tbl1.odo_retorno}</td>
                    <td>{$tbl1.data_retorno} {$tbl1.hora_retorno}</td>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante</td>
                <td>Data e Hora da Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data e Hora da Chegada</td>
            </tr>
        </tfoot>
    </table>
</div>