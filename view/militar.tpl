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
<!--Alertas-->
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
<!--Alertas-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form action="executar" method="post">
        <div class = "panel panel-primary">
            <div class="panel-heading btn" data-toggle="collapse" data-target="#dados_militares">Dados do Militar</div>
            <div class = "panel-body collapse in" id="dados_militares">
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="numero_militar">Número do Militar</label>
                    <input class="form-control" type="number" id="numero_militar" name="numero_militar" placeholder="Número"  maxlength="100" value="{$numero_militar}" autofocus="true"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="cp">CP</label>
                    <input class="form-control" type="text" id="cp" name="cp" placeholder="CP"  maxlength="100" value="{$cp}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="grupo">Grupo</label>
                    <input class="form-control" type="number" id="grupo" name="grupo" placeholder="Grupo"  maxlength="100" value="{$grupo}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="antiguidade">Antiguidade</label>
                    <input class="form-control" type="number" id="antiguidade" name="antiguidade" placeholder="Antiguidade"  maxlength="100" value="{$antiguidade}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="data_praca">Data de Praça</label>
                    <input class="form-control data" type="text" id="data_praca" name="data_praca" placeholder="Data de Praça"  maxlength="100" value="{$data_praca}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="pg">Posto/Grad</label>
                    <select class="form-control" id="pg" name="pg">
                        <option value='' disabled selected>Selecione o Posto/Grad</option>
                        {foreach $relacao_posto_grad as $pg}
                            <option value={$pg.id_posto_grad}{if {$pg.id_posto_grad} == {$id_pg}} selected {/if}>{$pg.sigla}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="nome_completo">Nome Completo</label>
                    <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo"  maxlength="100" value="{$nome_completo}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="nome">Nome de Guerra</label>
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome de Guerra"  maxlength="20" value="{$nome}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input class="form-control data" type="text" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento"  maxlength="20" value="{$data_nascimento}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="estado">Estado Natal</label>
                    <input class="form-control" type="text" id="estado_natal" name="estado_natal" placeholder="Estado"  maxlength="20" value="{$estado_nascimento}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="cidade">Cidade Natal</label>
                    <input class="form-control" type="text" id="cidade_natal" name="cidade_natal" placeholder="Cidade"  maxlength="20" value="{$cidade_nascimento}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="idt_militar">Identidade Militar</label>
                    <input class="form-control" type="text" id="idt_militar" name="idt_militar" placeholder="Identidade Militar"  maxlength="11" value="{$idt_militar}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="rg">RG</label>
                    <input class="form-control" type="text" id="rg" name="rg" placeholder="RG"  maxlength="11" value="{$rg}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="orgao_expedidor">Orgão Expedidor</label>
                    <input class="form-control" type="text" id="orgao_expedidor" name="orgao_expedidor" placeholder="Orgão Expedidor"  maxlength="6" value="{$orgao_expedidor}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF"  maxlength="11" value="{$cpf}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="pai">Pai</label>
                    <input class="form-control" type="text" id="pai" name="pai" placeholder="Pai"  maxlength="100" value="{$pai}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="mae">Mãe</label>
                    <input class="form-control" type="text" id="mae" name="mae" placeholder="Mãe"  maxlength="100" value="{$mae}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-8">
                    <label for="conjuge">Cônjuge</label>
                    <input class="form-control" type="text" id="conjuge" name="conjuge" placeholder="Nome Completo do Cônjuge"  maxlength="100" value="{$conjuge}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <label for="data_nascimento_conjuge">Data de Nascimento Cônjuge</label>
                    <input class="form-control data" type="text" id="data_nascimento_conjuge" name="data_nascimento_conjuge" placeholder="Data Nascimento Cônjuge"  maxlength="20" value="{$data_nascimento_conjuge}"/>
                </div>
            </div>
        </div>
        <div class = "panel panel-primary">
            <div class="panel-heading btn" data-toggle="collapse" data-target="#endereco_militar">Endereço do Militar</div>
            <div class = "panel-body collapse in" id="endereco_militar">    
                {if $enderecos != 0}
                    {foreach $militar_atualizar_endereco as $endereco}
                        <div id="enderecos">
                            <input type='hidden' id='id_enderecos' name="id_enderecos[]" class='enderecos' value='{$endereco.id_endereco}'/>
                            <div class="form-group col-xs-12 col-sm-6 col-md-2">
                                <label for="rua">Tipo</label>
                                <input class="form-control" type="text" id="tipo_endereco" name="tipo_endereco[]" placeholder="Tipo"  maxlength="20" value="{$endereco.tipo}"/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6">
                                <label for="rua">Rua</label>
                                <input class="form-control" type="text" id="rua" name="rua[]" placeholder="Rua e Número" value="{$endereco.rua}"/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="bairro">Bairro</label>
                                <input class="form-control" type="text" id="bairro" name="bairro[]" placeholder="Bairro"  value="{$endereco.bairro}"/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="complemento">Complemento</label>
                                <input class="form-control" type="text" id="complemento" name="complemento[]" placeholder="Complemento" value="{$endereco.complemento}"/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="estado">Estado</label>
                                <input class="form-control" type="text" id="estado" name="estado[]" placeholder="Estado"  maxlength="2" value="{$endereco.estado}"/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="cidade">Cidade</label>
                                <input class="form-control" type="text" id="cidade" name="cidade[]" placeholder="Cidade"   value="{$endereco.cidade}"/>
                            </div>       
                            {if {$endereco.id_status} != 2}
                                <span id='apaga_endereco' class='endereco col-xs-12 col-sm-12 col-md-12 btn btn-danger'>Remover Endereço</span>
                            {/if}
                            {if {$endereco.id_status} != 1}
                                <span id='ativar_endereco' class='ativarendereco col-xs-12 col-sm-12 col-md-12 btn btn-success '>Ativar Endereço</span>
                            {/if}
                        </div>
                    {/foreach}
                {else}
                    <div id="enderecos">
                        <div class="form-group col-xs-12 col-sm-6 col-md-2">
                            <label for="rua">Tipo</label>
                            <input class="form-control" type="text" id="tipo_endereco" name="tipo_endereco[]" placeholder="Tipo"  maxlength="20" value="{$rua}"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6">
                            <label for="rua">Rua</label>
                            <input class="form-control" type="text" id="rua" name="rua[]" placeholder="Rua e Número" value="{$rua}"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="bairro">Bairro</label>
                            <input class="form-control" type="text" id="bairro" name="bairro[]" placeholder="Bairro"  value="{$bairro}"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="complemento">Complemento</label>
                            <input class="form-control" type="text" id="complemento" name="complemento[]" placeholder="Complemento" value="{$complemento}"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="estado">Estado</label>
                            <input class="form-control" type="text" id="estado" name="estado[]" placeholder="Estado"  maxlength="2" value="{$estado}"/>
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" type="text" id="cidade" name="cidade[]" placeholder="Cidade"   value="{$cidade}"/>
                        </div>        
                    </div>
                {/if}
                <div id="outro_endereco"></div>
                <span class="btn btn-default col-xs-12 col-sm-12 col-md-12" id="outro">Mais Endereço</span>
            </div>
        </div>
        <div class = "panel panel-primary">
            <div class="panel-heading btn" data-toggle="collapse" data-target="#contatos">Contatos do Militar</div>
            <div class = "panel-body collapse in" id="contatos">     
                {if $telefones != 0}
                    {foreach $militar_atualizar_telefone as $telefone}
                        <div id="telefones" class='telefones'>
                            <input type='hidden' id='id_telefones' name="id_telefones[]" class='telefones' value='{$telefone.id_telefone}'/>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="tipo_telefone">Tipo</label>
                                <input class="form-control" type="text" id="tipo_telefone" name="tipo_telefone[]" placeholder="Tipo" value="{$telefone.tipo}"/>
                            </div>                
                            <div class="form-group col-xs-12 col-sm-6 col-md-6">
                                <label for="telefone">Telefone</label>
                                <input class="form-control" type="text" id="telefone" name="telefone[]" placeholder="Telefone" value="{$telefone.numero}"/>
                            </div>
                            {if {$telefone.id_status} != 2}
                                <span id='apaga_telefone' class='telefone col-xs-12 col-sm-12 col-md-12 btn btn-danger'>Remover Telefone</span>
                            {/if}
                            {if {$telefone.id_status} != 1}
                                <span id='ativar_telefone' class='ativartelefone col-xs-12 col-sm-12 col-md-12 btn btn-success '>Ativar Telefone</span>
                            {/if}
                        </div>
                    {/foreach}
                {else}
                    <div id="telefones" class='telefones'>
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="tipo_telefone">Tipo</label>
                            <input class="form-control" type="text" id="tipo_telefone" name="tipo_telefone[]" placeholder="Tipo" value="{$telefone.tipo}"/>
                        </div>                
                        <div class="form-group col-xs-12 col-sm-6 col-md-6">
                            <label for="telefone">Telefone</label>
                            <input class="form-control" type="text" id="telefone" name="telefone[]" placeholder="Telefone" value="{$telefone.numero}"/>
                        </div>
                    </div>
                {/if}
                <div  class="col-xs-12 col-sm-12 col-md-12">
                    <span name="alerta_telefone" id="alerta_telefone"></span>
                </div>
                <div id="outro_telefone"></div>
                <span class="btn btn-default col-xs-12 col-sm-12 col-md-12" id="outros_telefones">Mais Telefone</span>
                {if $emails != 0}
                    {foreach $militar_atualizar_email as $email}
                        <div id="emails">
                            <input type='hidden' id='id_emails' name="id_emails[]" class='telefones' value='{$email.id_email}'/>
                            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email[]" placeholder="E-mail"  value="{$email.email}"/>
                            </div>
                             {if {$email.id_status} != 2}
                                <span id='apaga_email' class='email col-xs-12 col-sm-12 col-md-12 btn btn-danger'>Remover Email</span>
                            {/if}
                            {if {$email.id_status} != 1}
                                <span id='ativar_email' class='ativaremail col-xs-12 col-sm-12 col-md-12 btn btn-success '>Ativar Email</span>
                            {/if}
                        </div>
                    {/foreach}
                {else}
                    <div id="emails">
                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email[]" placeholder="E-mail"/>
                        </div>
                    </div>
                {/if}
                <div id="outro_email"></div>
                <span class="btn btn-default col-xs-12 col-sm-12 col-md-12" id="outros_emails">Mais E-mail</span>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <label class="checkbox-inline"><input type="checkbox" id="laranjeira" name="laranjeira"><label>Laranjeira</label></label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id_militar' name='id_militar' value='{$id_militar}' />
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar">{$botao}</button>
        </div>
    </form>
</div>
</div>
<div class="container">
    <legend>Militares Cadastrados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Nome de Guerra</td>
                <td>Posto/Grad</td>
                <td>Número do Militar</td>
                <td>CP</td>
                <td>Grupo</td>
                <td>Antiguidade</td>
                <td>Data de Praça</td>            
                <td>Nome Completo</td>
                <td>DLN</td>
                <td>Identidade Militar</td>
                <td>RG</td>
                <td>Órgão Expedidor</td>
                <td>CPF</td>
                <td>Endereços</td>
                <td>Telefones</td>
                <td>Emails</td>
                <td>Pais</td>
                <td>Conjuge e Data Nascimento</td>
                <td>Laranjeira</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $militares_cadastrados as $tbl}
            <td>{$tbl.nome}</td>
            <td>{$tbl.sigla}</td>
            <td>{$tbl.numero_militar}</td>
            <td>{$tbl.cp}</td>
            <td>{$tbl.grupo}</td>
            <td>{$tbl.antiguidade}</td>
            <td>{$tbl.data_praca}</td>
            <td>{$tbl.nome_completo}</td>
            <td>{$tbl.cidade_nascimento} {$tbl.estado_nascimento} {$tbl.data_nascimento}</td>
            <td>{$tbl.idt_militar}</td>
            <td>{$tbl.rg}</td>
            <td>{$tbl.orgao_expedidor}</td>
            <td>{$tbl.cpf}</td>
            <td>{$tbl.enderecos}</td>
            <td>{$tbl.telefones}</td>
            <td>{$tbl.emails}</td>
            <td>{$tbl.pai} {$tbl.mae}</td>
            <td>{$tbl.conjuge} {$tbl.data_nascimento_conjuge}</td>
            <td>{$tbl.laranjeira}</td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_militar}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}"><span class='glyphicon glyphicon-remove-sign'/></button></td>
            <td><form action='militar' method='post'>
                    <input type='hidden' id='id' value='{$tbl.id_militar}' name='id'/>
                    <button class='btn btn-success' type='submit' id='enviar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr> 
        {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Nome de Guerra</td>
                <td>Posto/Grad</td>
                <td>Número do Militar</td>
                <td>CP</td>
                <td>Grupo</td>
                <td>Antiguidade</td>
                <td>Data de Praça</td>            
                <td>Nome Completo</td>
                <td>DLN</td>
                <td>Identidade Militar</td>
                <td>RG</td>
                <td>Órgão Expedidor</td>
                <td>CPF</td>
                <td>Endereços</td>
                <td>Telefones</td>
                <td>Emails</td>
                <td>Pais</td>
                <td>Conjuge e Data Nascimento</td>
                <td>Laranjeira</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>
