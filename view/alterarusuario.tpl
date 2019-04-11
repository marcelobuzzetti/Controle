<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form id="formulario" action="executar" method="post">
        <div class=" form-group col-xs-12 col-sm-6 col-md-3" >
            <label for="militar">Militar</label>
            <select class="form-control a" id="militar" name="militar" required tabindex="1" disabled>
                <option value='' disabled selected>Selecione o Militar</option>
                {foreach $relacao_militares as $militares}
                    <option value={$militares.id_militar} {if {$militares.id_militar} == {$militar}}selected{/if}>{$militares.sigla} {$militares.nome} </option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="login">Login</label>
            <input autofocus class="form-control login" type="text" id="login" name="login" value='{$login1}' placeholder='Digite o Login' required maxlength="20" tabindex="1"/>  
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="senha_antiga">Senha Antiga</label>
            <input class="form-control"  type="password" id="senha_antiga" name="senha_antiga" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="senha_nova">Senha Nova</label>
            <input class="form-control"  type="password" id="senha_nova" name="senha_nova" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="senha">Repete Senha Nova</label>
            <input class="form-control"  type="password" id="senha" name="senha" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/>
        </div>
        {if $perfil === 1}
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="perfil">Perfil</label>
            <select class="form-control" id="perfil" name="perfil" required tabindex="3" disabled>
                <option value='' disabled selected>Selecione o Perfil</option>
                {foreach $relacao_perfis as $perfis}
                    <option value={$perfis.id_perfil} {if {$perfis.id_perfil} == {$perfil}}selected{/if}>{$perfis.descricao}</option>
                {/foreach}
            </select>
        </div>
        {/if}
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="apelido">Apelido</label>
            <input class="form-control" type="text" name="apelido" id="apelido" value='{$apelido}' required placeholder="Como quer ser chamado" maxlength="20" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id' name='id' value='{$id_usuario}'/>
            <button type="button" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" value="alterar_usuario" id="enviar" name="enviar" tabindex="5" onclick="atualizarUsuario()">{$botao}</button>
        </div>
    </form>
</div>