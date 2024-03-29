<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente ativar este Militar?
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
                    <button type="submit" class="btn btn-success" name='enviar' value="ativar_militar">Sim</button>
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
</div>
<div class="container">
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Nome de Guerra</td>
                <td>Posto/Grad</td>
                <td>Nome Completo</td>
                <td>DLN</td>
                <td>Identidade Militar</td>
                <td>CPF</td>
                <td>Ativar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $militares_cadastrados as $tbl}
            <td>{$tbl.nome}</td>
            <td>{$tbl.sigla}</td>
            <td>{$tbl.nome_completo}</td>
            <td>{$tbl.cidade_nascimento} {$tbl.estado_nascimento} {$tbl.data_nascimento}</td>
            <td>{$tbl.idt_militar}</td>
            <td>{$tbl.cpf}</td>
            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_militar}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}"><span class='glyphicon glyphicon-refresh'/></button></td>
            </tr> 
        {/foreach}
        </tbody>
        <tfoot>
            <tr>
                 <td>Nome de Guerra</td>
                <td>Posto/Grad</td>
                <td>Nome Completo</td>
                <td>DLN</td>
                <td>Identidade Militar</td>
                <td>CPF</td>
                <td>Ativar</td>
            </tr>
        </tfoot>
    </table>
</div>
