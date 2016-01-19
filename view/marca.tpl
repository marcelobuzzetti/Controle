<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Marcas</td>
                                <td><input autofocus class="form-control" type="text" id="marca" name="marca" placeholder="Marca" required="required" value="{$descricao}" maxlength="20" tabindex="1"/></td>
                            </tr>
                            <input type='hidden' id='{$id_marca}' value='{$id_marca}' name='id'/>
                            <td colspan="2"><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></td>
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
                    <legend>Marcas Cadastradas</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Marca</td>
                            <td colspan="2">Ações</td>
                        </tr>
                        {foreach $relacao_marcas as $marca name=relacao_marcas}
                            <tr>
                                <td>{$smarty.foreach.relacao_marcas.iteration}</td>
                                <td>{$marca.descricao}</td>
                            <form action='executar' method='post'>
                                <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_marca'/><span class="glyphicon glyphicon-remove"/></form></td>
                            </form>
                            <form action='marca' method='post'>
                                <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_marca'/><span class="glyphicon glyphicon-refresh"/></form></td>
                            </form>
                            </tr>
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>