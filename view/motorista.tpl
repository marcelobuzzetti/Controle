<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Motorista?
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
                <div class="categoria">
                    <div class="input-group">
                        <div class="input-group-addon">Categoria</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="Apagar Motorista">Sim</button>
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
        <form action="executar" method="post">
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="nome_completo">Nome Completo</label>
                <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" required="required" maxlength="100" value="{$nome_completo}" tabindex="1"/>
            </div>
            <div>
                <span name="alerta" id="alerta"></span>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="pg">Posto/Grad</label>
                <select class="form-control" id="pg" name="pg" required tabindex="2">
                    <option value='' disabled selected>Selecione o Posto/Grad</option>
                    {foreach $relacao_posto_grad as $pg}
                        <option value={$pg.id_posto_grad}{if {$pg.id_posto_grad} == {$id_pg}} selected {/if}>{$pg.sigla}</option>
                    {/foreach}
                </select>
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
                <label for="rg">RG</label>
                <input class="form-control" type="text" id="rg" name="rg" placeholder="RG" required="required" maxlength="11" value="{$rg}" tabindex="5"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="orgao_expedidor">Orgão Expedidor</label>
                <input class="form-control" type="text" id="orgao_expedidor" name="orgao_expedidor" placeholder="Orgão Expedidor" required="required" maxlength="6" value="{$orgao_expedidor}" tabindex="6"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="cpf">CPF</label>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required="required" maxlength="11" value="{$cpf}" tabindex="7"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="cnh">CNH</label>
                <input class="form-control" type="text" id="cnh" name="cnh" placeholder="CNH" required="required" maxlength="11" value="{$cnh}" tabindex="8"/>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" required tabindex="9">
                    <option value='' disabled selected>Selecione a Habilitação</option>
                    {foreach $relacao_habilitacoes as $habilitacao}
                        <option value={$habilitacao.id_habilitacao}{if {$habilitacao.id_habilitacao} == {$categoria}} selected {/if}>{$habilitacao.categoria}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="validade">Validade</label>
                <input class="form-control" type="text" id="validade" name="validade" placeholder="dd/mm/aaaa" required="required" maxlength="20" value="{$validade}" tabindex="10"/>
            </div>    
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <input type='hidden' id='{$id_motorista}' value='{$id_motorista}' name='id'/>
                <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="11">{$botao}</button>
            </div>
        </form>
    </div>
</div>
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O motorista foi adicionada com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O motorista foi atualizado com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O motorista foi apagado com sucesso!
        </div>              
    {/if}
     {if $erro != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Não foi possível acessar o BD
        </div>              
    {/if}
</div>
<div class='container'>
    <div class="row">
        <div class="table-responsive" >
            <fieldset>
                <legend>Motoristas Cadastrados</legend>
                <table class='table' text-align='center'>
                    <tr>
                        <td>Ordem</td>
                        <td>Posto/Grad</td>
                        <td>Nome de Guerra</td>
                        <td>Categoria</td>
                        <td colspan="2">Ações</td>
                    </tr>
                    {foreach $tabela_motoristas_cadastrados as $tbl name=relacao_motoristas}
                        <td>{$smarty.foreach.relacao_motoristas.iteration}</td>
                        <td>{$tbl.sigla}</td>
                        <td>{$tbl.nome}</td>
                        <td>{$tbl.categoria}</td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_motorista}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}" data-categoria="{$tbl.categoria}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                        <form action='motorista' method='post'>
                            <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                            <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
                        </tr> 
                    {/foreach}
                </table>
            </fieldset>
        </div>
    </div>
</div>