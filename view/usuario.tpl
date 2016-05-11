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
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="login">Login</label>
            <input autofocus class="form-control" type="text" id="login" name="login" value='{$login1}' placeholder='Digite o Login' required maxlength="20" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="senha">Senha</label>
            <input class="form-control"  type="password" id="senha" name="senha" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="perfil">Perfil</label>
            <select class="form-control" name="perfil" required tabindex="3">
                <option value='' disabled selected>Selecione o Perfil</option>
                {foreach $relacao_perfis as $perfil}
                    <option value={$perfil.id_perfil}>{$perfil.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="apelido">Apelido</label>
            <input class="form-control" type="text" name="apelido" id="apelido" value='{$apelido}' required placeholder="Como quer ser chamado" maxlength="20" tabindex="4"/>
        </div>
        <span name="alerta" id="alerta"></span>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id' name='id' value='{$id_usuario}'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" value="{$evento}" id="enviar" name="enviar" tabindex="5">{$botao}</button>
        </div>
    </form>
</div>
<div class="container">
    <table id="usuario" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
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
                    <td>{$tbl.login}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.nome}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_usuario}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='usuario' method='post'>
                            <input type='hidden' id='id'  name='id' value='{$tbl.id_usuario}'/>
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_usuario'/><span class='glyphicon glyphicon-refresh  '/></form></td>
                    </form>
                </tr>
            {/foreach}   
        </tbody>
        <tfoot>
            <tr>
                <td>Login</td>
                <td>Perfil</td>
                <td>Apelido</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>