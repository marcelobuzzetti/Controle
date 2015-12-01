        <fieldset>
            <legend>{$titulo}</legend>
            <table class="table" text-align='center' style='width: 100%'>
                <tr>
                    <td>Número Vale</td>
                    <td>Motorista</td>
                    <td>Viatura</td>
                    <td>Combustível</td>
                    <td>Tipo</td>
                    <td>Quantidade</td>
                    <td></td>
                </tr>
                <tr>
               <form action="../model/executar.php" method="post">
                    <td><label for="nrvale"><input class="form-control" type="text" style='width: 150px' id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" value="{$dados_abastecimentos.nrvale}"/></label></td>
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
                    <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="{$qnt}"/></label></td>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
                    </tr>
            </table>
        </form>
        <table border=2px style='width:100%'>
            <caption>Abastecimentos</caption>
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
                   <td></td>
                   <td></td>
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
                <form action='../../model/executar.php' method='post'>
                                    <input type='hidden' id='{$tbl.id_abastecimento}' value='{$tbl.id_abastecimento}' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_abst'/>Apagar Abastecimento</form></td>
                </form>
            <form action='abastecimento.php' method='post'>
                                    <input type='hidden' id='{$tbl.id_abastecimento}' value='{$tbl.id_abastecimento}' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/>Atualizar Abastecimento</form></td>
            </form></tr>
            {/foreach}    
        </table>  
    </fieldset>
</BODY>
</HTML>