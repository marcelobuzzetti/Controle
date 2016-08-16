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