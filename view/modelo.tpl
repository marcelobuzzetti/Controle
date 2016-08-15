<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="marca_modelo">Marca</label>
            <select class="form-control" id="marca_modelo" name="marca_modelo" required tabindex="1">
                <option value='' disabled selected>Selecione a Marca</option>
                {foreach $relacao_marcas as $marcas}
                    <option value={$marcas.id_marca} {if {$marcas.id_marca} == {$marca}} selected {/if}>{$marcas.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="modelo">Modelo</label>
            <input class="form-control" type="text"  id="modelo" name="modelo" placeholder="Modelo" required="required" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="cap_tanque">Capacidade do Tanque</label>
            <input class="form-control" type="number" id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required" min="1" max="200" step="1" value="{$cap_tanque}" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="consumo">Consumo</label>
            <input class="form-control" type="number"  id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required" min="0" max="100" step="1" value="{$consumo_padrao}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="cap_transp">Capacidade de Transporte</label>
            <input class="form-control" type="number" id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" min="0" max="50" step="1" value="{$cap_transp}" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' value='{$id_modelo}' name='id'/>
            <button type="submit" {if {$id_modelo} == NULL} disabled  {/if}class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" id="enviar" name="enviar" tabindex="6">{$botao}</button>
        </div>
    </form>
</div>
<!--Alerta-->
<div class="col-xs-12 col-sm-12 col-md-12">
    <span name="alerta" id="alerta"></span>
</div>