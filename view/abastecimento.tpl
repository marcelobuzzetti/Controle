<!--Alterar o CRUD-->

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Abastecimento?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_abst">Sim</button>
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
                    <label for="nrvale">Número Vale</label>
                    <input class="form-control" type="text" id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" maxlength="20" value="{$dados_abastecimentos.nrvale}" tabindex="1"/>
                </div>
                <td></td>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="motorista">Motorista</label>
                    <select class="form-control" name="motorista" required="required" tabindex="2">
                        <option value='' disabled selected>Selecione o Motorista</option>
                        {foreach $relacao_motoristas as $motorista}
                            <option value={$motorista.id_motorista}>{$motorista.apelido}</option>
                        {/foreach}
                    </select>
                </div>
                <td></td>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="viatura">Viatura</label>
                    <select class="form-control" name="viatura" required="required" tabindex="3">
                        <option value='' disabled selected>Selecione a Viatura</option>
                        {foreach $relacao_viaturas as $viaturas}
                            <option value={$viaturas.id_viatura}>{$viaturas.marca} - {$viaturas.modelo} - {$viaturas.placa}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="odometro">Odômetro</label>
                    <input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" step="0.1" min="0" max="999999" value="{$dados_abastecimentos.odometro}" tabindex="4"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="combustivel">Combustível</label>
                    <select class="form-control" name="combustivel" tabindex="5">
                        <option value='' disabled selected>Selecione o Combustível</option>
                        {foreach $relacao_combustiveis as $combustiveis}
                            <option value={$combustiveis.id_combustivel}>{$combustiveis.descricao}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="tp">Tipo Combustível</label>
                    <select class="form-control" name="tp" tabindex="6">
                        <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                        {foreach $relacao_tipos_combustiveis as $tipos_combustiveis}
                            <option value={$tipos_combustiveis.id_tipo_combustivel}>{$tipos_combustiveis.descricao}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="qnt">Quantidade</label>
                    <input class="form-control" type="number"  id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" max="1000" step="1" value="{$qnt}" tabindex="7"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <input type='hidden' id='{$id_abastecimento}' value='{$id_abastecimento}' name='id'/>
                    <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="8">{$botao}</button>
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
                                <td>{$tbl.odometro}</td>
                                <td>{$tbl.combustivel}</td>
                                <td>{$tbl.tipo}</td>
                                <td>{$tbl.qnt}</td>
                                <td>{$tbl.data}</td>
                                <td>{$tbl.hora}</td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_abastecimento}"><span class='glyphicon glyphicon-remove-sign'</button></td>
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