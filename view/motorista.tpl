<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive' text-align='center'>
                        <form action="executar" method="post">
                            <tr>
                                <td>Nome de Guerra</td>
                                <td><label for="nome"><input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required="required" value="{$nome}"/></label></td>
                            </tr>
                            <tr>
                                <td>Posto/Grad</td>
                                <td><label for="pg"><select class="form-control" name="pg" required'>
                                                            <option value='' disabled selected>Selecione o Posto/Grad</option>
                                            {foreach $relacao_posto_grad as $pg}
                                                <option value={$pg.id_posto_grad}>{$pg.sigla}</option>
                                            {/foreach}
                                        </select></label></td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td><label for="categoria"><select class="form-control" name="categoria" required>
                                            <option value='' disabled selected>Selecione a Habilitação</option>
                                            {foreach $relacao_habilitacoes as $habilitacao}
                                                <option value={$habilitacao.id_habilitacao}>{$habilitacao.categoria}</option>
                                            {/foreach}
                                        </select></label></td>
                            </tr>
                            <tr>
                            <input type='hidden' id='{$id_motorista}' value='{$id_motorista}' name='id'/>
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
                    <legend>Motoristas Cadastrados</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Posto/Grad</td>
                            <td>Nome de Guerra</td>
                            <td>Categoria</td>
                            <td colspan="2">Ações</td>
                        </tr>
                        {foreach $tabela_motoristas_cadastrados as $tbl name=relacao_motoristas}
                            <td>{$smarty.foreach.relacao_motoristas.iteration}</td>
                            <td>{$tbl.sigla}</td>
                            <td>{$tbl.nome}</td>
                            <td>{$tbl.categoria}</td>
                            <form action='executar' method='post'>
                                <input type='hidden' id='{$tbl.$id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' /><span class='glyphicon glyphicon-remove'/></form></td>
                            </form>
                            <form action='motorista' method='post'>
                                <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' /><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form>
                            </tr> 
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
</body>
</html>
