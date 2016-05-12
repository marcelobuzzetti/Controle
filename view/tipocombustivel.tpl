<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Tipo de Combustível?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_tipo">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
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
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="descricao">Descrição</label>
            <input autofocus class="form-control" type="text" id="descricao_tipo" name="descricao" placeholder="Descrição" value='{$descricao}' required maxlength="20" tabindex="1"/>
        </div>
        <span name="alerta" id="alerta"></span>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='id'  name='id' value='{$id_tipo_combustivel}'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="2">{$botao}</button></td>
        </div>
    </form>
</div>
<div class="container">
    <legend>Tipos Combustíveis Cadastrados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Tipo</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_tipos_combustiveis as $tbl name='tipos_combustiveis'}
                <tr>
                    <td>{$tbl.descricao}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_tipo_combustivel}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='tipocombustivel' method='post'>
                            <input type='hidden' id='id' name='id' value='{$tbl.id_tipo_combustivel}' />
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_tipo'/><span class="glyphicon glyphicon-refresh"/></form></td>
                    </form>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Tipo</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>