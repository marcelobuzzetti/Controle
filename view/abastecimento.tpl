<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Número Vale</td>
                                <td>Motorista</td>
                                <td>Viatura</td>
                                <td>Combustível</td>
                                <td>Tipo</td>
                                <td>Quantidade</td>
                            </tr>
                            <tr>
                                <td><label for="nrvale"><input class="form-control" type="text" id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" value="{$dados_abastecimentos.nrvale}"/></label></td>
                                <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                                            <option value='' disabled selected>Selecione o Motorista</option>
                                            {foreach $relacao_motoristas as $motorista}
                                                <option value={$motorista.id_motorista}>{$motorista.apelido}</option>
                                            {/foreach}
                                        </select></label></td>
                                <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                            <option value='' disabled selected>Selecione a Viatura</option>
                                            {foreach $relacao_viaturas as $viaturas}
                                                <option value={$viaturas.id_viatura}>{$viaturas.marca} - {$viaturas.modelo} - {$viaturas.placa}</option>
                                            {/foreach}
                                        </select></label></td>
                                <td><label for="combustivel"><select class="form-control" name="combustivel">
                                            <option value='' disabled selected>Selecione o Combustível</option>
                                            {foreach $relacao_combustiveis as $combustiveis}
                                                <option value={$combustiveis.id_combustivel}>{$combustiveis.descricao}</option>
                                            {/foreach}
                                        </select></label></td>
                                <td><label for="tp"><select class="form-control" name="tp">
                                            <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                                            {foreach $relacao_tipos_combustiveis as $tipos_combustiveis}
                                                <option value={$tipos_combustiveis.id_tipo_combustivel}>{$tipos_combustiveis.descricao}</option>
                                            {/foreach}
                                        </select></label></td>
                            <input type='hidden' id='{$id_abastecimento}' value='{$id_abastecimento}' name='id'/>
                            <td><label for="qnt"><input class="form-control" type="number"  id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="{$qnt}"/></label></td>
                            <td colspan="2"><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
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
                    <legend>Abastecimentos</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Nº Vale</td>
                            <td>Motorista</td>
                            <td>Viatura</td>
                            <td>Combustível</td>
                            <td>Tipo</td>
                            <td>Quantidade</td>
                            <td>Data</td>
                            <td>Hora</td>
                            <td colspan="2">Ações</td>
                        </tr>
                        {foreach $tabela_relacao_abastecimentos as $tbl name=tabela_relacao_abastecimentos}
                            <tr>
                                <td>{$smarty.foreach.tabela_relacao_abastecimentos.iteration}</td>
                                <td>{$tbl.nrvale}</td>
                                <td>{$tbl.apelido}</td>
                                <td>{$tbl.marca} - {$tbl.placa} - {$tbl.modelos}</td>
                                <td>{$tbl.combustivel}</td>
                                <td>{$tbl.tipo}</td>
                                <td>{$tbl.qnt}</td>
                                <td>{$tbl.data}</td>
                                <td>{$tbl.hora}</td>
                            <form action='executar' method='post'>
                                <input type='hidden' id='{$tbl.id_abastecimento}' value='{$tbl.id_abastecimento}' name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_abst'/><span class='glyphicon glyphicon-remove'/></form></td>
                            </form>
                            <form action='abastecimento' method='post'>
                                <input type='hidden' id='{$tbl.id_abastecimento}' value='{$tbl.id_abastecimento}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form></tr>
                        {/foreach}    
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>