<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Tipo de Combustível?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_tipo">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Tipos Combustíveis Cadastrados</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Tipo</td>
                            <td colspan='2'>Ações</td>
                        </tr>
                        {foreach $relacao_tipos_combustiveis as $tbl name='tipos_combustiveis'}
                            <tr>
                                <td>{$smarty.foreach.tipos_combustiveis.iteration}</td>
                                <td>{$tbl.descricao}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_tipo_combustivel}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                            <form action='tipocombustivel' method='post'>
                                <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}' />
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipo'/><span class="glyphicon glyphicon-refresh"/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
            </div>
        </div>
    </div>
</div>