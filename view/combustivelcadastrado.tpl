<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Combustível?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_combustivel">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container table-responsive grafico'>
    <div class="jumbotron">
        <h1>Combustíveis Cadastrados</h1>
    </div>
    <table class='table table-striped table-hover' text-align='center'>
        <tr>
            <td>Combustível</td>
            <td colspan="2">Ações</td>
        </tr>
        {foreach $relacao_combustiveis as $comb name=relacao_combustiveis}
            <tr>
                <td>{$comb.descricao}</td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$comb.id_combustivel}"><span class='glyphicon glyphicon-remove-sign'</button></td>
            <form action='combustivel' method='post'>
                <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr>
        {/foreach}
    </table>
</div>
<div class='container tabela'>
    <div class="jumbotron">
        <h1>Combustíveis Cadastrados</h1>
    </div>
    <table class='table table-striped table-hover' text-align='center'>
        {foreach $relacao_combustiveis as $comb name=relacao_combustiveis}
            <tr>
                <td>Combustível: {$comb.descricao}</td>
            </tr>
            <tr>
                <td>Ações</td>
            </tr>
            <tr>
                <td><button type="button" class="btn btn-danger col-xs-12 col-sm-12 col-md-12" data-toggle="modal" data-target="#exampleModal" data-whatever="{$comb.id_combustivel}"><span class='glyphicon glyphicon-remove-sign'</button>
                    <form action='combustivel' method='post'>
                        <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                        <button class='btn btn-success col-xs-12 col-sm-12 col-md-12' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/><span class='glyphicon glyphicon-refresh'/></form></td>
                </form>
            </tr>
            <tr>
                <td></td>
            </tr>
        {/foreach}
    </table>
</div>
