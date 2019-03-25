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
            <input class="form-control" type="number" id="ano" name="ano" placeholder="Ano de Fabricação" required="required" value='{$ano}' step="1" min="1980" max='{date("Y")}' maxlength="4" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="placa">Placa/EB</label>
            <input class="form-control" type="text" id="placa" name="placa" placeholder="Placa" required="required" value='{$placa}' maxlength="50" tabindex="4"/>
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
            <label for="rfid">RFID</label>
            <input class="form-control" type="text" id="rfid__" name="rfid__" placeholder="RFID" value='{$rfid}' maxlength="50" tabindex="9"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="situacao">Situação</label>
            <select class="form-control" name="situacao" tabindex="10">
                <option value='' disabled selected>Selecione a Situação</option>
                {foreach $relacao_situacao as $situacoes}
                    <option value={$situacoes.id_situacao} {if {$situacoes.id_situacao} == {$situacao}}selected{/if}>{$situacoes.disponibilidade}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">        
            <input type='hidden' id='id' name='id' value='{$id_viatura}' />
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="11">{$botao}</button>
        </div>
    </form>
</div>