       <fieldset>
            <legend>{$titulo}</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="relatorio.php" method="post">
                    <tr>
                        <td>Data Início</td>
                        <td><label for="data_inicio"><input autofocus class="form-control" type="date" style='width: 150px' id="data_inicio" name="data_inicio"  required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Data Fim</td>
                        <td><label for="data_fim"><input autofocus class="form-control" type="date" style='width: 150px' id="data_fim" name="data_fim"  required="required"/></label></td>
                    </tr>
                    <tr>
                        <td><label><button type="submit" class="btn btn-primary" id="enviar" value="relatorio" name="enviar">Gerar Relatório</button></label></td>
                    </tr>
                </form>
            </table>
            {if $verificador == 1}
            <table class='table table-bordered' text-align='center'>
                                 <caption>Viaturas</caption>
                                    <tr>
                                        <td>Ordem</td>
                                        <td>Viatura</td>
                                        <td>Motorista</td>
                                        <td>Destino</td>
                                        <td>Odômetro Saída</td>
                                        <td>Ch Vtr</td>
                                        <td>Data Saída</td>
                                        <td>Hora Saída</td>
                                        <td>Odômetro Retorno</td>
                                        <td>Data Chegada</td>
                                        <td>Hora Chegada</td>
                                    </tr>
                                    {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                                    <tr>
                                        <td>{$smarty.foreach.relacao_relatorio.iteration}</td>
                                        <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                                        <td>{$tbl.apelido}</td>
                                        <td>{$tbl.destino}</td>
                                        <td>{$tbl.odo_saida}</td>
                                        <td>{$tbl.acompanhante}</td>
                                        <td>{$tbl.data_saida}</td>
                                        <td>{$tbl.hora_saida}</td>
                                        <td>{$tbl.odo_retorno}</td>
                                        <td>{$tbl.data_retorno}</td>
                                        <td>{$tbl.hora_retorno}</td>
                                    </tr>
                                    {/foreach}
            </table>
            {/if}
       </fieldset>