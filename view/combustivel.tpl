<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Descrição</td>
                                <td><input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição" required="required" maxlength="20" value='{$descricao}' tabindex="1"/></td>
                            </tr>
                            <input type='hidden' id='{$id_combustivel}' value='{$id_combustivel}' name='id'/>
                            <td colspan="2"><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar" tabindex="2">{$botao}</button></td>
                            </tr>
                        </form>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Combustíveis Cadastrados</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Combustível</td>
                            <td colspan="2">Ações</td>
                        </tr>
                        {foreach $relacao_combustiveis as $comb name=relacao_combustiveis}
                            <tr>
                                <td>{$smarty.foreach.relacao_combustiveis.iteration}</td>
                                <td>{$comb.descricao}</td>
                                <td><a class='btn btn-danger' data-toggle="modal" data-target="#delete-modal"/><span class='glyphicon glyphicon-remove'/></form></td>
                                <!-- Modal -->
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modalLabel">Excluir Combustivel</h4>
                                        </div>
                                        <div class="modal-body">
                                            Deseja realmente excluir este combustivel?
                                        </div>
                                        <div class="modal-footer">
                                            <form action='executar' method='post'>
                                                <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                                                <button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_combustivel'/>Sim</button>
                                            </form>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->
                            <form action='combustivel' method='post'>
                                <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>