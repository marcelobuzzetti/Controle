<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente ativar este Usuário?
                <div class="sigla">
                    <div class="input-group">
                        <div class="input-group-addon">Posto</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="nome">
                    <div class="input-group">
                        <div class="input-group-addon">Nome</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-success" name='enviar' value="ativar_usuario">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Nao</button>
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
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Militar</td>
                <td>Login</td>
                <td>Perfil</td>
                <td>Apelido</td>
                <td>Ativar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_usuarios as $tbl}
                <tr>
                    <td>{$tbl.sigla} {$tbl.nome_guerra}</td>
                    <td>{$tbl.login}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.nome}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_usuario}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome_guerra}"><span class='glyphicon glyphicon-refresh'/></button></td>
                </tr>
            {/foreach}   
        </tbody>
        <tfoot>
            <tr>
                <td>Militar</td>
                <td>Login</td>
                <td>Perfil</td>
                <td>Apelido</td>
                <td>Ativar</td>
            </tr>
        </tfoot>
    </table>
</div>