<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Marca</td>
                                <td><select class="form-control" name="marca" required tabindex="1">
                                            <option value='' disabled selected>Selecione a Marca</option>
                                            {foreach $relacao_marcas as $marca}
                                                <option value={$marca.id_marca}>{$marca.descricao}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td><input class="form-control" type="text"  id="modelo" name="modelo" placeholder="Modelo" required="required" value="{$descricao}" tabindex="2"/></td>
                            </tr>
                            <tr>
                                <td>Capacidade do Tanque</td>
                                <td><input class="form-control" type="number" id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required" min="1" max="200" step="1" value="{$cap_tanque}" tabindex="3"/></td>
                            </tr>
                            <tr>
                                <td>Consumo</td>
                                <td><input class="form-control" type="number"  id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required" min="0" max="100" step="1" value="{$consumo_padrao}" tabindex="4"/></td>
                            </tr>
                            <tr>
                                <td>Capacidade de Transporte</td>
                                <td><input class="form-control" type="number" id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" min="0" max="50" step="1" value="{$cap_transp}" tabindex="5"/></td>
                            </tr>
                            <tr>
                                <td>Habilitação Necessária</td>
                                <td><select class="form-control" name="habilitacao" required tabindex="6">
                                            <option value='' disabled selected>Selecione a Habilitação</option>
                                            {foreach $relacao_habilitacoes as $habilitacao}
                                                <option value={$habilitacao.id_habilitacao}>{$habilitacao.categoria}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                            <input type='hidden' id='{$id_modelo}' value='{$id_modelo}' name='id'/>
                            <td colspan="2"><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar" tabindex="7">{$botao}</button></label></td>
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
                            <form action='executar' method='post'>
                                <input type='hidden' id='{$tbl.id_modelo}' value='{$tbl.id_modelo}' name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_modelo'/><span class='glyphicon glyphicon-remove'/></form></td>
                            </form>
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