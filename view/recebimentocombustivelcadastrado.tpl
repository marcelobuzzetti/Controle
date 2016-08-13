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
<div class="container">
    <legend>Combustiveis Recebidos</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Combustível</td>
                <td>Tipo</td>
                <td>Quantidade</td>
                <td>Motivo</td>
                <td>Data</td>
                <td>Hora</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_rcb_combustiveis as $tbl name=relacao_rcb_combustiveis}
                <tr>
                    <td>{$tbl.combustivel}</td>
                    <td>{$tbl.tipo}</td>
                    <td>{$tbl.qnt}</td>
                    <td>{$tbl.motivo}</td>
                    <td>{$tbl.data}</td>
                    <td>{$tbl.hora}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_recibo_combustivel }"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='recebimentocombustivel' method='post'>
                            <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar'/><span class="glyphicon glyphicon-refresh"/></form></td>
                    </form>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Combustível</td>
                <td>Tipo</td>
                <td>Quantidade</td>
                <td>Motivo</td>
                <td>Data</td>
                <td>Hora</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>