<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="marca">Marcas</label>
            <input autofocus class="form-control" type="text" id="marca" name="marca" placeholder="Marca" required="required" value="{$descricao}" maxlength="20" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' id='{$id_marca}' value='{$id_marca}' name='id'/>
            <button type="submit" {if {$id_marca} == NULL} disabled  {/if} class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" id="enviar" name="enviar" tabindex="2">{$botao}</button>
        </div>
    </form>
</div>
<!--Alerta-->
<div class="col-xs-12 col-sm-12 col-md-12">
    <span name="alerta" id="alerta"></span>
</div>
<div class="container">
    <legend>Marcas Cadastradas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_marcas as $marca name=relacao_marcas}
                <tr>
                    <td>{$marca.descricao}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$marca.id_marca}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='marca' method='post'>
                            <input type='hidden' id='{$marca.id_marca}' value='{$marca.id_marca}' name='id'/>
                            <button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_marca'/><span class="glyphicon glyphicon-refresh"/></form></td>
                    </form>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Marca</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>