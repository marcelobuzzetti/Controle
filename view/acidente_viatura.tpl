<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>     
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="viatura">Viatura - Placa</label>
            <select class="form-control" name="viatura_acidente" id="viatura_acidente" required="required" tabindex="1">
                <option value='' disabled selected>Selecione a Viatura</option>
                {foreach $relacao_viaturas as $viatura}
                    <option value={$viatura.id_viatura} {if {$viatura.id_viatura} == {$id_viatura}}selected{/if}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="motorista">Motorista</label>
            <select class="form-control" id="motorista" name="motorista" required="required" tabindex="2">
                <option value='' disabled selected>Selecione o Motorista</option>
                {foreach $relacao_motoristas as $motoristas}
                    <option value={$motoristas.id_motorista} {if {$motoristas.id_motorista} == {$id_motorista}}selected{/if}>{$motoristas.apelido}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="acompanhante">Acompanhante(s)</label>
            <input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante" value='{$acompanhante}' tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="odometro">Odômetro</label>
            <input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" value='{$odometro}'  step="0.1" min="0" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="data">Data</label>
            <input class="form-control" type="text" id="data" name="data"  required="required" value='{$data}' placeholder='Data Acidente' tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="acidente">Descrição do Acidente</label>
            <textarea class="form-control" rows="10" id="acidente" name="acidente" placeholder="Descrição do Acidente" required='required'  tabindex="6">{$descricao}</textarea>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="avarias">Descrição das Avarias</label>
            <textarea class="form-control" rows="10" id="avarias" name="avarias" placeholder="Descrição das Avarias" required='required'  tabindex="7">{$avarias}</textarea>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label class="checkbox-inline"><input type="checkbox" id="disponibilidade" name="disponibilidade" {$disponibilidade}><label>Indisponibilizar Vtr</label></label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' value='{$id_acidente_viatura}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="8">{$botao}</button>
        </div>
    </form>
</div>