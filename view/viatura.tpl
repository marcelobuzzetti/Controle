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
                                <td><select class="form-control" id="marca" name="marca" required tabindex="1">
                                            <option value='' disabled selected>Selecione a Marca</option>
                                            {foreach $relacao_marcas as $marca}
                                                <option value={$marca.id_marca}>{$marca.descricao}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td><select class="form-control" id="modelo" name="modelo"  required tabindex="2">
                                            <option value='' class="Selecione" disabled selected>Selecione a Marca</option>
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Placa</td>
                                <td><input class="form-control" type="text" id="placa" name="placa" placeholder="Placa" required="required" value='{$placa}' tabindex="3"/></td>
                            </tr>
                            <tr>
                                <td>Odômetro</td>
                                <td><input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" value='{$odometro}' step="0.1" min="0" max="999999" tabindex="4"/></td>
                            </tr>
                            <tr>
                                <td>Situação</td>
                                <td><select class="form-control" name="situacao" tabindex="5">
                                            <option value='' disabled selected>Selecione a Situação</option>
                                            {foreach $relacao_situacao as $situacao}
                                                <option value={$situacao.id_situacao}>{$situacao.disponibilidade}</option>
                                            {/foreach}
                                        </select></td>
                            </tr>
                            <tr>
                            <input type='hidden' id='id' name='id' value='{$id_viatura}' />
                            <td colspan="2"><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar" tabindex="6">{$botao}</button></td>
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
                    <legend>Viaturas Cadastradas</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>Placa</td>
                            <td>Odômetro</td>
                            <td>Capacidade do Tanque</td>
                            <td>Consumo Km/L</td>
                            <td>Capacidade(Pessoas)</td>
                            <td>Habilitação Necessária</td>
                            <td>Situação</td>
                            <td colspan='2'>Ações</td>
                        </tr>
                        {foreach $relacao_viaturas as $tbl name='viaturas'}
                            <tr>
                                <td>{$smarty.foreach.viaturas.iteration}</td>
                                <td>{$tbl.marca}</td>
                                <td>{$tbl.modelo}</td>
                                <td>{$tbl.placa}</td>
                                <td>{$tbl.odometro}</td>
                                <td>{$tbl.cap_tanque}</td>
                                <td>{$tbl.consumo_padrao}</td>
                                <td>{$tbl.cap_transp}</td>
                                <td>{$tbl.categoria}</td>
                                <td>{$tbl.disponibilidade}</td>
                            <form action='executar' method='post'>
                                <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_viatura'/><span class='glyphicon glyphicon-remove'/></form></td>
                            </form>
                            <form action='viatura' method='post'>
                                <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>