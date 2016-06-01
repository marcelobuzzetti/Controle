<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Militar?
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
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_militar">Sim</button>
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
    <form action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="numero_militar">Número do Militar</label>
            <input class="form-control" type="number" id="numero_militar" name="numero_militar" placeholder="Número" required="required" maxlength="100" value="{$numero_militar}" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="cp">CP</label>
            <input class="form-control" type="text" id="cp" name="cp" placeholder="CP" required="required" maxlength="100" value="{$cp}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="grupo">Grupo</label>
            <input class="form-control" type="number" id="grupo" name="grupo" placeholder="Grupo" required="required" maxlength="100" value="{$grupo}" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="antiguidade">Antiguidade</label>
            <input class="form-control" type="number" id="antiguidade" name="antiguidade" placeholder="Antiguidade" required="required" maxlength="100" value="{$antiguidade}" tabindex="4"/>
        </div>
         <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="data_praca">Data de Praça</label>
            <input class="form-control" type="text" id="data_praca" name="data_praca" placeholder="Data de Praça" required="required" maxlength="100" value="{$data_praca}" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="pg">Posto/Grad</label>
            <select class="form-control" id="pg" name="pg" required tabindex="2">
                <option value='' disabled selected>Selecione o Posto/Grad</option>
                {foreach $relacao_posto_grad as $pg}
                    <option value={$pg.id_posto_grad}{if {$pg.id_posto_grad} == {$id_pg}} selected {/if}>{$pg.sigla}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="nome_completo">Nome Completo</label>
            <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" required="required" maxlength="100" value="{$nome_completo}" tabindex="1"/>
        </div>
        <div>
            <span name="alerta" id="alerta"></span>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="nome">Nome de Guerra</label>
            <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome de Guerra" required="required" maxlength="20" value="{$nome}" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="data_nascimento">Data de Nascimento</label>
            <input class="form-control" type="text" id="data_nascimento" name="data_nascimento" placeholder="dd/mm/aaaa" required="required" maxlength="20" value="{$data_nascimento}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="cidade">Cidade</label>
            <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade" required="required" maxlength="20" value="{$cidade_nascimento}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="estado">Estado</label>
            <input class="form-control" type="text" id="estado" name="estado" placeholder="Estado" required="required" maxlength="20" value="{$estado_nascimento}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="idt_militar">Identidade Militar</label>
            <input class="form-control" type="text" id="idt_militar" name="idt_militar" placeholder="Identidade Militar" required="required" maxlength="11" value="{$idt_militar}" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="rg">RG</label>
            <input class="form-control" type="text" id="rg" name="rg" placeholder="RG" required="required" maxlength="11" value="{$rg}" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="orgao_expedidor">Orgão Expedidor</label>
            <input class="form-control" type="text" id="orgao_expedidor" name="orgao_expedidor" placeholder="Orgão Expedidor" required="required" maxlength="6" value="{$orgao_expedidor}" tabindex="6"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="cpf">CPF</label>
            <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required="required" maxlength="11" value="{$cpf}" tabindex="7"/>
        </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="pai">Pai</label>
            <input class="form-control" type="text" id="pai" name="pai" placeholder="Pai" required="required" maxlength="100" value="{$pai}" tabindex="1"/>
        </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="mae">Mãe</label>
            <input class="form-control" type="text" id="mae" name="mae" placeholder="Mãe" required="required" maxlength="100" value="{$mae}" tabindex="1"/>
        </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-8">
            <label for="conjuge">Cônjuge</label>
            <input class="form-control" type="text" id="conjuge" name="conjuge" placeholder="Nome Completo" required="required" maxlength="100" value="{$conjuge}" tabindex="1"/>
        </div>
         <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label for="data_nascimento_conjuge">Data de Nascimento Cônjuge</label>
            <input class="form-control" type="text" id="data_nascimento_conjuge" name="data_nascimento_conjuge" placeholder="dd/mm/aaaa" required="required" maxlength="20" value="{$data_nascimento}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id' value='{$id_militar}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="8">{$botao}</button>
        </div>
    </form>
</div>
{if $cadastrado != NULL}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O militar foi adicionada com sucesso!
        </div>              
    </div>
{/if}
{if $atualizado != NULL}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O militar foi atualizado com sucesso!
        </div>  
    </div>
{/if}
{if $apagado != NULL}
    <div class='container'>
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O militar foi apagado com sucesso!
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
</div>
<div class="container">
    <legend>Militares Cadastrados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Data de Nascimento</td>
                <td>RG</td>
                <td>Órgão Expedidor</td>
                <td>CPF</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $militares_cadastrados as $tbl}
            <td>{$tbl.sigla}</td>
            <td>{$tbl.nome}</td>
            <td>{$tbl.nome_completo}</td>
            <td>{$tbl.data_nascimento}</td>
            <td>{$tbl.rg}</td>
            <td>{$tbl.orgao_expedidor}</td>
            <td>{$tbl.cpf}</td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_militar}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}"><span class='glyphicon glyphicon-remove-sign'</button></td>
            <td><form action='militar' method='post'>
                    <input type='hidden' id='id' value='{$tbl.id_militar}' name='id'/>
                    <button class='btn btn-success' type='submit' id='enviar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr> 
        {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Data de Nascimento</td>
                <td>RG</td>
                <td>Órgão Expedidor</td>
                <td>CPF</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>