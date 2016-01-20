<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Combustível</td>
                                <td><select class="form-control" name="combustivel" tabindex="1">
                                            <option value='' disabled selected>Selecione o Combustível</option>
                                            {foreach $relacao_combustiveis as $combustiveis}
                                                <option value={$combustiveis.id_combustivel}>{$combustiveis.descricao}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Tipo</td>
                                <td><select class="form-control" name="tp" tabindex="2">
                                            <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                                            {foreach $relacao_tipo_combustiveis as $tipos_combustiveis}
                                                <option value={$tipos_combustiveis.id_tipo_combustivel}>{$tipos_combustiveis.descricao}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Quantidade</td>
                                <td><input class="form-control" type="number" id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" max="999999" step="1" value="{$qnt}" tabindex="3"/></td>
                            </tr>
                            <tr>
                                <td>Motivo</td>
                                <td><input class="form-control" type="text" id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" maxlength="20" value="{$motivo}" tabindex="4"/></td>
                            </tr>
                            <tr>
                            <input type='hidden' id='{$id_rcb_comb}' value='{$id_rcb_comb}' name='id'/>
                            <td colspan="2"><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar" tabindex="5">{$botao}</button></td>
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
                    <legend>Combustível Recebido</legend>
                    <table class='table' text-align='center'>
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
                            <form action='executar' method='post'>
                                <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_rcb_comb'/><span class="glyphicon glyphicon-remove"/></form></td>
                            </form>
                            <form action='recebimentocombustivel' method='post'>
                                <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class="glyphicon glyphicon-refresh"/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>