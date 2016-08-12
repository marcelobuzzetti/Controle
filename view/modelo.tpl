<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Modelo?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_modelo">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Alerta-->
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo foi adicionada com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo foi atualizado com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O modelo foi apagado com sucesso!
        </div>              
    {/if}
</div>
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="marca_modelo">Marca</label>
            <select class="form-control" id="marca_modelo" name="marca_modelo" required tabindex="1">
                <option value='' disabled selected>Selecione a Marca</option>
                {foreach $relacao_marcas as $marcas}
                    <option value={$marcas.id_marca} {if {$marcas.id_marca} == {$marca}} selected {/if}>{$marcas.descricao}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="modelo">Modelo</label>
            <input class="form-control" type="text"  id="modelo" name="modelo" placeholder="Modelo" required="required" value="{$descricao}" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="cap_tanque">Capacidade do Tanque</label>
            <input class="form-control" type="number" id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required" min="1" max="200" step="1" value="{$cap_tanque}" tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="consumo">Consumo</label>
            <input class="form-control" type="number"  id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required" min="0" max="100" step="1" value="{$consumo_padrao}" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="cap_transp">Capacidade de Transporte</label>
            <input class="form-control" type="number" id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" min="0" max="50" step="1" value="{$cap_transp}" tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' value='{$id_modelo}' name='id'/>
            <button type="submit" {if {$id_modelo} == NULL} disabled  {/if}class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" id="enviar" name="enviar" tabindex="6">{$botao}</button>
        </div>
    </form>
</div>
<!--Alerta-->
<div class="col-xs-12 col-sm-12 col-md-12">
    <span name="alerta" id="alerta"></span>
</div>
<div class="container">
    <legend>Modelos Cadastradas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_modelos_cadastrados as $tbl name=relacao_modelos}
                <tr>
                    <td>{$tbl.marca}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.cap_tanque}</td>
                    <td>{$tbl.consumo_padrao}</td>
                    <td>{$tbl.cap_transp}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_modelo}"><span class='glyphicon glyphicon-remove-sign'/></button></td>
            <form action='modelo' method='post'>
                <td><input type='hidden' id='{$tbl.id_modelo}' value='{$tbl.id_modelo}' name='id'/>
                    <button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_modelo'/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr>
        {/foreach} 
        </tbody>
        <tfoot>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>