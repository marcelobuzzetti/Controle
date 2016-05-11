<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Viatura?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_viatura">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class="container">
    <table id="viatura" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Ordem</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Placa</td>
                <td>Odômetro</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Habilitação Necessária</td>
                <td>Situação</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_viaturas as $tbl name='viaturas'}
                <tr>
                    <td>{$smarty.foreach.viaturas.iteration}</td>
                    <td>{$tbl.marca}</td>
                    <td>{$tbl.modelo}</td>
                    <td>{$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.cap_tanque}</td>
                    <td>{$tbl.consumo_padrao}</td>
                    <td>{$tbl.cap_transp}</td>
                    <td>{$tbl.categoria}</td>
                    <td>{$tbl.disponibilidade}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='viatura' method='post'>
                            <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form>
                </tr>
            {/foreach}  
        </tbody>
        <tfoot>
            <tr>
                <td>Ordem</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Placa</td>
                <td>Odômetro</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Habilitação Necessária</td>
                <td>Situação</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>