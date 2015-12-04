<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >
                <fieldset>
                    <legend>{$titulo}</legend>
                    <table class='table table-responsive table-bordered' text-align='center'>
                        <form action="executar" method="post">
                                <tr>
                                    <td>Login:</td>
                                    <td><label for="login"><input autofocus class="form-control" type="text" id="login" name="login" value='{$login1}' placeholder='Digite o Login' required /></label></td>
                                </tr>
                                <tr>
                                    <td>Senha</td>
                                    <td><label for="senha"><input class="form-control"  type="password" id="senha" name="senha" placeholder='Digite a Senha' required/></label></td>
                                </tr>
                                <tr>
                                    <td>Perfil:</td>
                                    <td><label for="perfil"><select class="form-control" name="perfil" required>
                                                <option value='' disabled selected>Selecione o Perfil</option>
                                                {foreach $relacao_perfis as $perfil}
                                                    <option value={$perfil.id_perfil}>{$perfil.descricao}</option>
                                                {/foreach}
                                            </select></label></td>
                                </tr>
                                <tr>
                                    <td>Apelido:</td>
                                    <td><label for="apelido"><input class="form-control" type="text" name="apelido" id="apelido" value='{$apelido}' required placeholder="Como quer ser chamado"/></label></td>
                                </tr>
                                <tr>
                                <input type='hidden' id='id' name='id' value='{$id_usuario}'/>
                                <td colspan="2"><button type="submit" class="btn btn-primary" value="{$evento}" name="enviar">{$botao}</button></td>
                                </tr>
                            </form>
                        </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container-fluid'>
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
                        <form action='executar' method='post'>
                            <input type='hidden' id='id'  name='id' value='{$tbl.id_usuario}'/>
                            <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_usuario'/><span class='glyphicon glyphicon-remove'/></form></td>
                        </form>
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