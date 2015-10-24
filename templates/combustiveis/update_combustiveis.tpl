     <fieldset>
            <legend>Cadastro Tipo de Combustivel</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Descrição</td>
                        <td><label for="descricao"><input class="form-control" type="text" style='width: 150px' id="descricao" name="descricao" placeholder="Descrição" required="required" value='{$descricao}'/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='{$id_combustivel}' value='{$id_combustivel}' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_combustivel" name="enviar">Atualizar</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Tipo de Combustíveis Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td></td>
                        <td></td>
                    </tr>
                    {foreach $relacao_combustiveis as $comb name=relacao_combustiveis}
                        <tr>
                            <td>{$smarty.foreach.relacao_combustiveis.iteration}</td>
                            <td>{$comb.descricao}</td>
                        <form action='../configs/executar.php' method='post'>
                            <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_combustivel'/>Apagar Combustível</form></td>
                        </form>
                        <form action='update_combustivel.php' method='post'>
                                    <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/>Atualizar Combustível</form></td>
                        </form>
                        </tr>
        {/foreach}
        </table>
        </fieldset>
    </BODY>
</HTML>
