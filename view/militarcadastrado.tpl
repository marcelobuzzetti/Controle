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
</div>
<div class="container">
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
