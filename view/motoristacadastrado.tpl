<div class="wrapper" role="main">
    <div class='container'>
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
                                <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value="Apagar Motorista"/><span class='glyphicon glyphicon-remove'/></form></td>
                            </form>
                            <form action='motorista' method='post'>
                                <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                                <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
                            </form>
                            </tr> 
                        {/foreach}
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>