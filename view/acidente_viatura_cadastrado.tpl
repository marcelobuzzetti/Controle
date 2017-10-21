<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Acidente?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name"  name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_acidente">Sim</button>
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
            O Acidente foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O Acidente foi fechada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O Acidente foi apagado com sucesso!
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
                <td>Motorista</td>
                <td>Acompanhante(s)</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Disponibilidade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_acidentes as $tbl name=relacao_acidentes}
                <tr>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.motorista}</td>
                    <td>{$tbl.acompanhante}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.data}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.avarias}</td>
                    <td>{$tbl.disponibilidade}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_acidente_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td> <form action='acidentevtr' method='post'>
                            <input type='hidden' id='{$tbl.id_acidente_viatura}' value='{$tbl.id_acidente_viatura}' name='id'/><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_acidente'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form></tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Acompanhante(s)</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Disponibilidade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>