<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Usuário?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_usuario">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Alertas-->
{if $cadastrado != NULL}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O usuario foi adicionada com sucesso!
        </div>              
    </div>
{/if}
{if $ativado != NULL}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O usuario foi ativado com sucesso!
        </div>              
    </div>
{/if}
{if $atualizado != NULL}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O usuario foi atualizado com sucesso!
        </div>  
    </div>
{/if}
{if $apagado != NULL}
    <div class='container'>
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O usuario foi apagado com sucesso!
        </div>              
    </div>
{/if}
{if $erro != NULL}
    <div class='container'>
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Não foi possível acessar o BD
        </div>    
    </div>
{/if}
<!--Alertas-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Militar</td>
                <td>Login</td>
                <td>Perfil</td>
                <td>Apelido</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_usuarios as $tbl name='usuarios'}
                <tr>
                    <td>{$tbl.sigla} {$tbl.nome_guerra}</td>
                    <td>{$tbl.login}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.nome}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_usuario}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='usuario' method='post'>
                            <input type='hidden' id='id'  name='id' value='{$tbl.id_usuario}'/>
                            <button class='btn btn-success' type='submit' id='enviar' name='enviar' value='atualizar_usuario'/><span class='glyphicon glyphicon-refresh  '/></form></td>
                    </form>
                </tr>
            {/foreach}   
        </tbody>
        <tfoot>
            <tr>
                <td>Militar</td>
                <td>Login</td>
                <td>Perfil</td>
                <td>Apelido</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>