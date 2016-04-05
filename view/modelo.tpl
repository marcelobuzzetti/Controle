<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Modelo?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_modelo">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class="wrapper" role="main">
    <div class='container'>
        <div class="jumbotron">
            <h1>{$titulo}</h1>
            <form action="executar" method="post">
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="marca">Marca</label>
                    <select class="form-control" name="marca" required tabindex="1">
                        <option value='' disabled selected>Selecione a Marca</option>
                        {foreach $relacao_marcas as $marca}
                            <option value={$marca.id_marca}>{$marca.descricao}</option>
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
                    <td><input class="form-control" type="number"  id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required" min="0" max="100" step="1" value="{$consumo_padrao}" tabindex="4"/></td>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="cap_transp">Capacidade de Transporte</label>
                    <input class="form-control" type="number" id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" min="0" max="50" step="1" value="{$cap_transp}" tabindex="5"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <input type='hidden' id='{$id_modelo}' value='{$id_modelo}' name='id'/>
                    <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="7">{$botao}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Modelos Cadastradas</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>Capacidade do Tanque</td>
                            <td>Consumo Km/L</td>
                            <td>Capacidade(Pessoas)</td>
                            <td>Habilitação Necessária</td>
                            <td colspan="2">Ações</td>
                        </tr>
                        {foreach $tabela_modelos_cadastrados as $tbl name=relacao_modelos}
                            <tr>
                                <td>{$smarty.foreach.relacao_modelos.iteration}</td>
                                <td>{$tbl.marca}</td>
                                <td>{$tbl.descricao}</td>
                                <td>{$tbl.cap_tanque}</td>
                                <td>{$tbl.consumo_padrao}</td>
                                <td>{$tbl.cap_transp}</td>
                                <td>{$tbl.habilitacao}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_modelo}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                            <form action='modelo' method='post'>
                                <input type='hidden' id='{$tbl.id_modelo}' value='{$tbl.id_modelo}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_modelo'/><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>