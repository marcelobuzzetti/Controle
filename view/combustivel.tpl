<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Combustível?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_combustivel">Sim</button>
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
        <div class=" form-group col-xs-12 col-sm-12 col-md-12" >
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" id="descricao" name="descricao" placeholder="Descrição" required="required" maxlength="20" value='{$descricao}' tabindex="1"/>
        </div>
        <span name="alerta" id="alerta"></span>
        <div class=" form-group col-xs-12 col-sm-12 col-md-12" >
            <input type='hidden' id='{$id_combustivel}' value='{$id_combustivel}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="2">{$botao}</button>
        </div>
    </form>
</div>
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O combustível foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O combustível foi atualizado com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O combustível foi apagado com sucesso!
        </div>              
    {/if}
</div>
<legend>Combustíveis Cadastrados</legend>
<table id="combustivel" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>Combustível</td>
            <td>Apagar</td>
            <td>Atualizar</td>
        </tr>
    </thead>
    <tbody>
        {foreach $relacao_combustiveis as $comb name=relacao_combustiveis}
            <tr>
                <td>{$comb.descricao}</td>
                <td><button type="button" class="btn btn-danger col-xs-12 col-sm-12 col-md-12" data-toggle="modal" data-target="#exampleModal" data-whatever="{$comb.id_combustivel}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                <td>    <form action='combustivel' method='post'>
                        <input type='hidden' id='{$comb.id_combustivel}' value='{$comb.id_combustivel}' name='id'/>
                        <button class='btn btn-success col-xs-12 col-sm-12 col-md-12' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/><span class='glyphicon glyphicon-refresh'/></form></td>
                </form>
            </tr>
        {/foreach}
    </tbody>
    <tfoot>
        <tr>
            <td>Combustível</td>
            <td>Apagar</td>
            <td>Atualizar</td>
        </tr>
    </tfoot>
</table>