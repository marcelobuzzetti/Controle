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