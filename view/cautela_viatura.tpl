<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>     
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="viatura">Viatura - Placa</label>
            <select class="js-example-responsive custom-select form-control" name="viatura" id="viatura" required="required" tabindex="1">
                <option value='' disabled selected>Selecione a Viatura</option>
                {foreach $relacao_viaturas as $viatura}
                    <option value={$viatura.id_viatura} {if {$viatura.id_viatura} == {$id_viatura}}selected{/if}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="odometro">Odômetro</label>
            <input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" value='{$odometro}'  step="0.1" min="0" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="data">Data</label>
            <input class="form-control" type="text" id="data" name="data"  required="required" value='{$data}' placeholder='Escolha a data da Cautela' tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="responsavel">Responsável pela Cautela</label>
            <input class="form-control" type="text" id="responsavel" name="responsavel" placeholder="Responsável pela Cautela" required="required" maxlength="30" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="idt">Identidade Militar</label>
            <input class="form-control" type="text" id="idt" name="idt" placeholder="Identidade Militar" required="required" maxlength="30" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="telefone">Telefone para contato</label>
            <input class="form-control" type="text" id="tlf" name="tlf" placeholder="Telefone" required="required" maxlength="30" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="om">OM</label>
            <input class="form-control" type="text" id="om" name="om" placeholder="OM" required="required" maxlength="30" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="material">Material que acompanha a viatura</label>
            <textarea class="form-control" rows="10" id="material" name="material" placeholder="Material que acompanha a viatura" required='required'  tabindex="4">{$descricao}</textarea>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="obs">Observações sobre a viatura</label>
            <textarea class="form-control" rows="10" id="obs" name="obs" placeholder="Observações sobre a viatura" required='required'  tabindex="4">{$descricao}</textarea>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' value='{$id_alteracao_viatura}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="5">{$botao}</button>
        </div>
    </form>
</div>