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
                    <option value={$combustiveis.id_combustivel}>{$combustiveis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="tipo">Tipo</label>
            <select class="form-control" name="tp" tabindex="2">
                <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                {foreach $relacao_tipo_combustiveis as $tipos_combustiveis}
                    <option value={$tipos_combustiveis.id_tipo_combustivel}>{$tipos_combustiveis.descricao}</option>
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
<div class='container table-responsive grafico'>
    <legend>Combustível Recebido</legend>
    <table class='table table-striped table-hover' text-align='center'>
        <tr>
            <td>Ordem</td>
            <td>Combustível</td>
            <td>Tipo</td>
            <td>Quantidade</td>
            <td>Motivo</td>
            <td>Data</td>
            <td>Hora</td>
            <td colspan="2">Ações</td>
        </tr>
        {foreach $relacao_rcb_combustiveis as $tbl name=relacao_rcb_combustiveis}
            <tr>
                <td>{$smarty.foreach.relacao_rcb_combustiveis.iteration}</td>
                <td>{$tbl.combustivel}</td>
                <td>{$tbl.tipo}</td>
                <td>{$tbl.qnt}</td>
                <td>{$tbl.motivo}</td>
                <td>{$tbl.data}</td>
                <td>{$tbl.hora}</td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_recibo_combustivel }"><span class='glyphicon glyphicon-remove-sign'</button></td>
            <form action='recebimentocombustivel' method='post'>
                <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class="glyphicon glyphicon-refresh"/></form></td>
            </form>
            </tr>
        {/foreach}
    </table>
</div>
<div class='container tabela'>
    <legend>Combustível Recebido</legend>
    <table class='table table-striped table-hover' text-align='center'>
        {foreach $relacao_rcb_combustiveis as $tbl name=relacao_rcb_combustiveis}
            <tr>
                <td>Ordem {$smarty.foreach.relacao_rcb_combustiveis.iteration}</td>
            </tr>
            <tr>
                <td>Combustível {$tbl.combustivel}</td>
            </tr>
            <tr>
                <td>Tipo {$tbl.tipo}</td>
            </tr>
            <tr>
                <td>Quantidade {$tbl.qnt}</td>
            </tr>
            <tr>
                <td>Motivo {$tbl.motivo}</td>
            </tr>
            <tr>
                <td>Data {$tbl.data}</td>
            </tr>
            <tr>
                <td>Hora {$tbl.hora}</td>
            </tr>
            <tr>
                <td>Ações</td>
            </tr>
            <tr>
                <td><button type="button" class="btn btn-danger col-xs-12 col-sm-12 col-md-12" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_recibo_combustivel }"><span class='glyphicon glyphicon-remove-sign'</button>
                    <form action='recebimentocombustivel' method='post'>
                        <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                        <button class='btn btn-success col-xs-12 col-sm-12 col-md-12' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class="glyphicon glyphicon-refresh"/></form></td>
                </form>
            </tr>
            <tr>
                <td></td>
            </tr>
        {/foreach}
    </table>
</div>