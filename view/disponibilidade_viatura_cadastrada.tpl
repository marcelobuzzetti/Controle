<!--Alertas-->
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A alteração foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A alteração foi atualizada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A alteração foi apagado com sucesso!
        </div>              
    {/if}
</div>
<!--Alertas-->
<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Alteração?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name"  name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_disponibilidade">Sim</button>
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
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data Início</td>
                <td>Apagar/Resolver</td>
                <td>Data Fim</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_alteracao as $tbl}
                <tr {if $tbl.id_status == 1} style="background: rgba(255, 0, 0, 0.3);" {/if}>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.data}</td>
                    {if $tbl.id_status == 1}
                    <td><form action='executar' method='post'><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_disponibilidade}"><span class='glyphicon glyphicon-remove-sign' title='Apagar'></button>
                            <input type='hidden' id='{$tbl.id_disponibilidade}' value='{$tbl.id_disponibilidade}' name='id'/>
                            <input type='hidden' value='{$tbl.id_viatura}' name='id_viatura'/>
                            <button class='btn btn-success' type='submit' id='resolver' name='enviar' value='atualiza_disponibilidade' title='Resolver'>
                                <span class='glyphicon glyphicon-refresh'></span>
                            </button>
                        </form></td>
                    {else}
                    <td>Resolvido</td>
                    {/if}
                    <td>{$tbl.data_fim}</td>
                    </form></tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data Início</td>
                <td>Apagar/Resolver</td>
                <td>Data Fim</td>
            </tr>
        </tfoot>
    </table>
</div>