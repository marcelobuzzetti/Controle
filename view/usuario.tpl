<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive table-bordered' text-align='center'>
                        <form action="executar" method="post">
                                <tr>
                                    <td>Login:</td>
                                    <td><input autofocus class="form-control" type="text" id="login" name="login" value='{$login1}' placeholder='Digite o Login' required maxlength="20" tabindex="1"/></td>
                                </tr>
                                <tr>
                                    <td>Senha</td>
                                    <td><input class="form-control"  type="password" id="senha" name="senha" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/></td>
                                </tr>
                                <tr>
                                    <td>Perfil:</td>
                                    <td><select class="form-control" name="perfil" required tabindex="3">
                                                <option value='' disabled selected>Selecione o Perfil</option>
                                                {foreach $relacao_perfis as $perfil}
                                                    <option value={$perfil.id_perfil}>{$perfil.descricao}</option>
                                                {/foreach}
                                            </select></td>
                                </tr>
                                <tr>
                                    <td>Apelido:</td>
                                    <td><input class="form-control" type="text" name="apelido" id="apelido" value='{$apelido}' required placeholder="Como quer ser chamado" maxlength="20" tabindex="4"/></td>
                                </tr>
                                <tr>
                                <input type='hidden' id='id' name='id' value='{$id_usuario}'/>
                                <td colspan="2"><button type="submit" class="btn btn-primary" value="{$evento}" name="enviar" tabindex="5">{$botao}</button></td>
                                </tr>
                            </form>
                        </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container'>
        <div class="row">
            <div class="table-responsive" >
                <table class='table' text-align='center'>
                    <legend>Usuários Cadastrados</legend>
                    <tr>
                        <td>Ordem</td>
                        <td>Login</td>
                        <td>Perfil</td>
                        <td>Apelido</td>
                        <td colspan="2">Ações</td>
                    </tr>
                    {foreach $relacao_usuarios as $tbl name='usuarios'}
                        <tr>
                            <td>{$smarty.foreach.usuarios.iteration}</td>
                            <td>{$tbl.login}</td>
                            <td>{$tbl.descricao}</td>
                            <td>{$tbl.nome}</td>
                            <td><a class='btn btn-danger'data-toggle="modal" data-target="#delete-modal"/><span class='glyphicon glyphicon-remove'/></form></td>
                        <!-- Modal -->
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modalLabel">Excluir Usuario</h4>
                                        </div>
                                        <div class="modal-body">
                                            Deseja realmente excluir este usuario?
                                        </div>
                                        <div class="modal-footer">
                                            <form action='executar' method='post'>
                                                 <input type='hidden' id='id'  name='id' value='{$tbl.id_usuario}'/>
                                                <button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_usuario'/>Sim</button>
                                            </form>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->
                        <form action='usuario' method='post'>
                            <input type='hidden' id='id'  name='id' value='{$tbl.id_usuario}'/>
                            <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_usuario'/><span class='glyphicon glyphicon-refresh  '/></form></td>
                        </form>
                        </tr>
                    {/foreach}
                </table>
            </div>
        </div>
    </div>
</div>