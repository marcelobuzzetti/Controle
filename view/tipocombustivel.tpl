        <fieldset>
            <legend>{$titulo}</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../model/executar.php" method="post">
                    <tr>
                        <td>Descrição</td>
                        <td><label for="descricao"><input autofocus class="form-control" type="text" style='width: 150px' id="descricao" name="descricao" placeholder="Descrição" value='{$descricao}' required/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='id'  name='id' value='{$id_tipo_combustivel}'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Tipos de Combustíveis Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Tipo</td>
                        <td></td>
                        <td></td>
                        </tr>
                        {foreach $relacao_tipos_combustiveis as $tbl name='tipos_combustiveis'}
                        <tr>
                            <td>{$smarty.foreach.tipos_combustiveis.iteration}</td>
                            <td>{$tbl.descricao}</td>
                                <form action='../model/executar.php' method='post'>
                                    <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_tipo'/>Apagar Tipo de Combustível</form></td>
                                </form>
                                <form action='tipocombustivel.php' method='post'>
                                    <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}' />
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipo'/>Atualizar Tipo de Combustível</form></td>
                                </form>
                        </tr>
                        {/foreach}
            </table>
        </fieldset>
    </body>
</html>
