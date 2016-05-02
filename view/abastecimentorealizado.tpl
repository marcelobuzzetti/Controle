<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Abastecimento?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_abst">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <div class="table-responsive" >
        <fieldset>
            <table class='table' text-align='center'>
                <tr>
                    <td>Ordem</td>
                    <td>Nº Vale</td>
                    <td>Motorista</td>
                    <td>Viatura</td>
                    <td>Odômetro</td>
                    <td>Combustível</td>
                    <td>Tipo</td>
                    <td>Quantidade</td>
                    <td>Data</td>
                    <td>Hora</td>
                    <td colspan="2">Ações</td>
                </tr>
                {foreach $tabela_relacao_abastecimentos as $tbl name=tabela_relacao_abastecimentos}
                    <tr>
                        <td>{$smarty.foreach.tabela_relacao_abastecimentos.iteration}</td>
                        <td>{$tbl.nrvale}</td>
                        <td>{$tbl.apelido}</td>
                        <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                        <td>{$tbl.odometro}</td>
                        <td>{$tbl.combustivel}</td>
                        <td>{$tbl.tipo}</td>
                        <td>{$tbl.qnt}</td>
                        <td>{$tbl.data}</td>
                        <td>{$tbl.hora}</td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_abastecimento}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <form action='abastecimento' method='post'>
                        <input type='hidden' id='{$tbl.id_abastecimento}' value='{$tbl.id_abastecimento}' name='id'/>
                        <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form></tr>
                {/foreach}    
            </table>
        </fieldset>
    </div>
</div>