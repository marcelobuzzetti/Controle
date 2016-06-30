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
    </div>
    <form action="executar" method="post">
        <div class=" form-group col-xs-12 col-sm-6 col-md-3" >
            <label for="militar">Militar</label>
            <select class="form-control" id="militar" name="militar" required tabindex="1"  {$update}>
                <option value='' disabled selected>Selecione o Militar</option>
                {foreach $relacao_militares as $militares}
                    <option value={$militares.id_militar} {if {$militares.id_militar} == {$id_militar}}selected{/if}>{$militares.sigla} {$militares.nome} </option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="cnh">CNH</label>
            <input class="form-control" type="text" id="cnh" name="cnh" placeholder="CNH" required="required" maxlength="11" value="{$cnh}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" required tabindex="3">
                <option value='' disabled selected>Selecione a Habilitação</option>
                {foreach $relacao_habilitacoes as $habilitacao}
                    <option value={$habilitacao.id_habilitacao}{if {$habilitacao.id_habilitacao} == {$id_habilitacao}} selected {/if}>{$habilitacao.categoria}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="validade">Validade</label>
            <input class="form-control" type="text" id="validade" name="validade" placeholder="dd/mm/aaaa" required="required" maxlength="20" value="{$validade}" tabindex="4"/>
        </div>    
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id' value='{$id_motorista}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="5">{$botao}</button>
        </div>
    </form>
</div>
<div class="container">
    <legend>Motoristas Cadastrados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Categoria</td>
                <td>Validade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_motoristas_cadastrados as $tbl name=relacao_motoristas}
            <td>{$tbl.sigla}</td>
            <td>{$tbl.nome}</td>
            <td>{$tbl.nome_completo}</td>
            <td>{$tbl.categoria}</td>
            <td>{$tbl.validade}</td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_motorista}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}" data-categoria="{$tbl.categoria}"><span class='glyphicon glyphicon-remove-sign'</button></td>
            <td><form action='motorista' method='post'>
                    <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                    <button class='btn btn-success' type='submit' id='apagar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr> 
        {/foreach}
        </tbody>
        <tfoot>
            <tr>
              <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Categoria</td>
                <td>Validade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>