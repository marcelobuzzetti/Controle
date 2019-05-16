<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class=" form-group col-xs-12 col-sm-6 col-md-3" >
            <label for="militar">Militar</label>
            <select class="form-control disabled" id="militar" name="militar" required tabindex="1" {$update}>
                <option value='' disabled selected>Selecione o Militar</option>
                {foreach $relacao_militares as $militares}
                    <option value={$militares.id_militar} {if {$militares.id_militar} == {$militar}}selected{/if}>{$militares.sigla} {$militares.nome} </option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="login">Login</label>
            <input autofocus class="form-control login" type="text" id="login" name="login" {if $login1 != NULL} value='{$login1}' {/if} placeholder='Digite o Login' required maxlength="20" tabindex="1"/>  
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="senha">Senha</label>
            <input class="form-control"  type="password" id="senha" name="senha" placeholder='Digite a Senha' required maxlength="20" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="perfil">Perfil</label>
            <select class="form-control" name="perfil" required tabindex="3">
                <option value='' disabled selected>Selecione o Perfil</option>
                {foreach $relacao_perfis as $perfis}
                    <option value={$perfis.id_perfil} {if {$perfis.id_perfil} == {$perfil}}selected{/if}>{$perfis.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="apelido">Apelido</label>
            <input class="form-control" type="text" name="apelido" id="apelido" value='{$apelido}' required placeholder="Como quer ser chamado" maxlength="20" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id' name='id' value='{$id_usuario}'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" value="{$evento}" id="enviar" name="enviar" tabindex="5" onclick="removerDisabled()">{$botao}</button>
        </div>
    </form>
</div>