<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Viatura?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_viatura">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form action="executar" method="post">
        <div class=" form-group col-xs-12 col-sm-6 col-md-3" >
            <label for="marca">Marca</label>
            <select class="form-control" id="marca" name="marca" required tabindex="1">
                <option value='' disabled selected>Selecione a Marca</option>
                {foreach $relacao_marcas as $marcas}
                    <option value={$marcas.id_marca} {if {$marcas.id_marca} == {$marca}}selected{/if}>{$marcas.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="modelo">Modelo</label>
            {if $update > 0}
                <select class='form-control' name='modelo' id='modelo' required tabindex="2">
                    <option value='' disabled selected>Selecione o Modelo</option>
                    {foreach $relacao_modelos as $modelos}
                        <option value={$modelos.id_modelo} {if {$modelos.id_modelo} == {$modelo}}selected{/if}>{$modelos.descricao}</option>
                    {/foreach}
                </select>
            {else}
                <select class="form-control" id="modelo" name="modelo"  required tabindex="2">
                    <option value='' class="Selecione" disabled selected>Selecione a Marca</option>
                </select>
            {/if}
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="viatura">Ano</label>
            <input class="form-control" type="number" id="ano" name="ano" placeholder="Ano de Fabricação" required="required" value='{$odometro}' step="1" min="1980" max="2016" maxlength="4" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="placa">Placa</label>
            <input class="form-control" type="text" id="placa" name="placa" placeholder="Placa" required="required" value='{$placa}'  maxlength="7" tabindex="4"/>
        </div>
        <span name="alerta" id="alerta"></span>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="odometro">Odômetro</label>
            <input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" value='{$odometro}' step="0.1" min="0" max="999999" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="tipo_viatura">Tipo de Viatura</label>
            <select class="form-control" name="tipo_viatura" tabindex="6">
                <option value='' disabled selected>Selecione o Tipo de Viatura</option>
                {foreach $relacao_tipos_viaturas as $tipo_viatura}
                    <option value={$tipo_viatura.id_tipo_viatura} {if {$tipo_viatura.id_tipo_viatura} == {$tipo_vtr}}selected{/if}>{$tipo_viatura.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="habilitacao">Habilitação Necessária</label>
            <select class="form-control" name="habilitacao" required tabindex="7">
                <option value='' disabled selected>Selecione a Habilitação</option>
                {foreach $relacao_habilitacoes as $habilitacoes}
                    <option value={$habilitacoes.id_habilitacao} {if {$habilitacoes.id_habilitacao} == {$habilitacao}}selected{/if}>{$habilitacoes.categoria}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="combustivel">Combustível</label>
            <select class="form-control" name="combustivel" required tabindex="8">
                <option value='' disabled selected>Selecione o Combustivel</option>
                {foreach $relacao_combustiveis as $combustiveis}
                    <option value={$combustiveis.id_combustivel} {if {$combustiveis.id_combustivel} == {$combustivel}}selected{/if}>{$combustiveis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="situacao">Situação</label>
            <select class="form-control" name="situacao" tabindex="9">
                <option value='' disabled selected>Selecione a Situação</option>
                {foreach $relacao_situacao as $situacoes}
                    <option value={$situacoes.id_situacao} {if {$situacoes.id_situacao} == {$situacao}}selected{/if}>{$situacoes.disponibilidade}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">        
            <input type='hidden' id='id' name='id' value='{$id_viatura}' />
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="10">{$botao}</button>
        </div>
    </form>
</div>
<div class="container">
    <legend>Viaturas Cadastradas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Placa</td>
                <td>Odômetro Atual</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Habilitação Necessária</td>
                <td>Situação</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_viaturas as $tbl name='viaturas'}
                <tr>
                    <td>{$tbl.marca}</td>
                    <td>{$tbl.modelo}</td>
                    <td>{$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.cap_tanque}</td>
                    <td>{$tbl.consumo_padrao}</td>
                    <td>{$tbl.cap_transp}</td>
                    <td>{$tbl.categoria}</td>
                    <td>{$tbl.disponibilidade}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='viatura' method='post'>
                            <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form>
                </tr>
            {/foreach}  
        </tbody>
        <tfoot>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Placa</td>
                <td>Odômetro Atual</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Habilitação Necessária</td>
                <td>Situação</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>
