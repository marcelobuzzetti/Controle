<fieldset>
            <legend>{$titulo}</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../model/executar.php" method="post">
                    <tr>
                        <td>Combustível</td>
                        <td><label for="combustivel"><select class="form-control" name="combustivel">
                                <option value='' disabled selected>Selecione o Combustível</option>
                                {foreach $relacao_combustiveis as $combustiveis}
                                    <option value={$combustiveis.id_combustivel}>{$combustiveis.descricao}</option>
                                {/foreach}
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td><label for="tipo"><select class="form-control" name="tp">
                                 <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                                {foreach $relacao_tipo_combustiveis as $tipos_combustiveis}
                                    <option value={$tipos_combustiveis.id_tipo_combustivel}>{$tipos_combustiveis.descricao}</option>
                                {/foreach}
                            </select></label></td>
                    </tr>
                    <tr>
                        <td>Quantidade</td>
                        <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="{$qnt}"/></label><br /></td>
                    </tr>
                    <tr>
                        <td>Motivo</td>
                        <td><label for="motivo"><input class="form-control" type="text" style='width: 150px' id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" value="{$motivo}"/></label></td>
                    </tr>
                    <tr>
                        <td></td>
                    <input type='hidden' id='{$id_rcb_comb}' value='{$id_rcb_comb}' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Combustível Recebido</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td>Tipo</td>
                        <td>Quantidade</td>
                        <td>Motivo</td>
                        <td>Data</td>
                        <td>Hora</td>
                        <td></td>
                        <td></td>
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
                                <form action='../model/executar.php' method='post'>
                                    <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_rcb_comb'/>Apagar Recebimento de Combustível</form></td>
                                </form>
                                <form action='recebimentocombustivel.php' method='post'>
                                    <input type='hidden' id='{$tbl.id_recibo_combustivel }' value='{$tbl.id_recibo_combustivel }' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/>Atualizar Recebimento de Combustível</form></td>
                                </form>
                        </tr>
                        {/foreach}
            </table>
        </fieldset>
    </body>
</html>