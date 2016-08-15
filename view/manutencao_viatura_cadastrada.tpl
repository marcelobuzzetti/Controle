<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Manutenção?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name"  name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_manutencao">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A manutenção foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A manutenção foi fechada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A manutenção foi apagado com sucesso!
        </div>              
    {/if}
</div>
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>     
    </div>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_manutencao as $tbl name=relacao_mnt_vtr}
                <tr>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.data}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_manutencao_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td> <form action='manutencaovtr' method='post'>
                            <input type='hidden' id='{$tbl.id_manutencao_viatura}' value='{$tbl.id_manutencao_viatura}' name='id'/><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_manutencao'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form></tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>