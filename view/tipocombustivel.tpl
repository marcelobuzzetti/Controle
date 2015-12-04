<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                    <tr>
                        <td>Descrição</td>
                        <td><label for="descricao"><input autofocus class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição" value='{$descricao}' required/></label></td>
                    </tr>
                    <input type='hidden' id='id'  name='id' value='{$id_tipo_combustivel}'/>
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
    <div class='container-fluid'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Tipos Combustíveis Cadastrados</legend>
                    <table class='table' text-align='center'>
                    <tr>
                        <td>Ordem</td>
                        <td>Tipo</td>
                        <td colspan='2'>Ações</td>
                        </tr>
                        {foreach $relacao_tipos_combustiveis as $tbl name='tipos_combustiveis'}
                        <tr>
                            <td>{$smarty.foreach.tipos_combustiveis.iteration}</td>
                            <td>{$tbl.descricao}</td>
                                <form action='executar' method='post'>
                                    <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_tipo'/><span class="glyphicon glyphicon-remove"/></form></td>
                                </form>
                                <form action='tipocombustivel' method='post'>
                                    <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}' />
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipo'/><span class="glyphicon glyphicon-refresh"/></form></td>
                                </form>
                        </tr>
                        {/foreach}
            </table>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
