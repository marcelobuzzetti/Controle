<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Marca?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_marca">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Alerta-->
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca foi adicionada com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca foi atualizada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A marca foi apagada com sucesso!
        </div>              
    {/if}
</div>
<div class="container">
     <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_marcas as $marca name=relacao_marcas}
                <tr>
                    <td>{$marca.descricao}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$marca.id_marca}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='marca' method='post'>
                            <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                            <button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_marca'/><span class="glyphicon glyphicon-refresh"/></form></td>
                    </form>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Marca</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>