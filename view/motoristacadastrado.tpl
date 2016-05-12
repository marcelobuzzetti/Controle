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
<div class='container table-responsive grafico'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>    
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Data de Nascimento</td>
                <td>RG</td>
                <td>CPF</td>
                <td>CNH</td>
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
            <td>{$tbl.data_nascimento}</td>
            <td>{$tbl.rg}</td>
            <td>{$tbl.cpf}</td>
            <td>{$tbl.cnh}</td>
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
                <td>Data de Nascimento</td>
                <td>RG</td>
                <td>CPF</td>
                <td>CNH</td>
                <td>Categoria</td>
                <td>Validade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>