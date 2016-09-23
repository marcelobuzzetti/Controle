<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Abastecimento?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_abst_especial">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="nrvale">Número Vale</label>
            <input class="form-control" type="text" id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" maxlength="20" value="{$nrvale}" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" id="desc" name="desc" placeholder="Descrição" required="required" maxlength="30" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="combustivel">Combustível</label>
            <select class="form-control" id="combustivel" id="combustivel" name="combustivel" tabindex="3">
                <option value='' disabled selected>Selecione o Combustível</option>
                {foreach $relacao_combustiveis as $combustiveis}
                    <option value={$combustiveis.id_combustivel} {if {$combustiveis.id_combustivel} == {$combustivel}}selected{/if}>{$combustiveis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="tp">Tipo Combustível</label>
            {if $update > 0}
                <select class="form-control" id="tp" name="tp" tabindex="4">
                    <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                    {foreach $relacao_tipos_combustiveis as $tipos_combustiveis}
                        <option value={$tipos_combustiveis.id_tipo_combustivel} {if {$tipos_combustiveis.id_tipo_combustivel} == {$tipo_combustivel}}selected{/if}>{$tipos_combustiveis.descricao}</option>
                    {/foreach}
                </select>
            {else}
                <select class="form-control" id="tp" name="tp" tabindex="4">
                    <option value='' disabled selected>Selecione Combustível</option>
                </select>
            {/if}
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="qnt">Quantidade</label>
            <input class="form-control" type="number"  id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" max="1000" step="1" value="{$qnt}" tabindex="5"/>
        </div>
        <span name="alerta" id="alerta"></span>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='{$id_abastecimento}' value='{$id_abastecimento}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="6">{$botao}</button>
        </div>
    </form>
</div>