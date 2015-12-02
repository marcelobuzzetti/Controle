<fieldset>
            <legend>{$titulo}</legend>
            <table border=2px text-align='center'style='width: 30%'>
                <form action="executar" method="post">
                    <tr>
                        <td>Nome de Guerra</td>
                        <td><label for="nome"><input class="form-control" type="text" style='width: 150px' id="nome" name="nome" placeholder="Nome" required="required" value="{$nome}"/></label></td>
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
                        <td></td>
                    <input type='hidden' id='{$id_motorista}' value='{$id_motorista}' name='id'/>
                   <td><label><button type="submit" class="btn btn-primary" id="enviar" value="{$evento}" name="enviar">{$botao}</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Motoristas Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Posto/Grad</td>
                        <td>Nome de Guerra</td>
                        <td>Categoria</td>
                        <td></td>
                        <td></td>
                        </tr>
                        {foreach $tabela_motoristas_cadastrados as $tbl name=relacao_motoristas}
                        <td>{$smarty.foreach.relacao_motoristas.iteration}</td>
                        <td>{$tbl.sigla}</td>
                        <td>{$tbl.nome}</td>
                        <td>{$tbl.categoria}</td>
                        <form action='executar' method='post'>
                                    <input type='hidden' id='{$tbl.$id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                                    <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar Motorista'/></form></td>
                        </form>
                        <form action='motorista' method='post'>
                                    <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                                    <td><input class='btn btn-success' type='submit' id='apagar' name='enviar' value='Atualizar Motorista'/></form></td>
                        </form>
                    </tr> 
                    {/foreach}
            </table>
        </fieldset>
    </body>
</html>
