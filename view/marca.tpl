 <fieldset>
            <legend>{$titulo}</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Marcas</td>
                        <td><label for="marca"><input autofocus class="form-control" type="text" style='width: 150px' id="marca" name="marca" placeholder="Marca" required="required" value="{$descricao}"/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='{$id_marca}' value='{$id_marca}' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Marcas Cadastradas</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Marca</td>
                        <td></td>
                        <td></td>
                    </tr>
                    {foreach $relacao_marcas as $marca name=relacao_marcas}
                    <tr>
                            <td>{$smarty.foreach.relacao_marcas.iteration}</td>
                            <td>{$marca.descricao}</td>
                        <form action='../configs/executar.php' method='post'>
                                    <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_marca'/>Apagar Marca</form></td>
                        </form>
                        <form action='index.php' method='post'>
                                    <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_marca'/>Atualizar Marca</form></td>
                        </form>
                    </tr>
                    {/foreach}
            </table>
        </fieldset>
    </body>
</html>