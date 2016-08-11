<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Recebimento de Combustível?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_rcb_comb">Sim</button>
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
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="combustivel">Combustível</label>
            <select class="form-control" name="combustivel" tabindex="1">
                <option value='' disabled selected>Selecione o Combustível</option>
                {foreach $relacao_combustiveis as $combustiveis}
                    <option value={$combustiveis.id_combustivel} {if {$combustiveis.id_combustivel} == {$combustivel}}selected{/if}>{$combustiveis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="tipo">Tipo</label>
            <select class="form-control" name="tp" tabindex="2">
                <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                {foreach $relacao_tipo_combustiveis as $tipos_combustiveis}
                    <option value={$tipos_combustiveis.id_tipo_combustivel} {if {$tipos_combustiveis.id_tipo_combustivel} == {$tipo_combustivel}}selected{/if}>{$tipos_combustiveis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" type="number" id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" max="999999" step="1" value="{$qnt}" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="motivo">Motivo</label>
            <input class="form-control" type="text" id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" maxlength="20" value="{$motivo}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='{$id_rcb_comb}' value='{$id_rcb_comb}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="5">{$botao}</button>
        </div>
    </form>
</div>