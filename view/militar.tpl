<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
</div>
<div class="container">
    <form action="executar" method="post">
        <div class = "panel panel-primary">
            <div class="panel-heading btn" data-toggle="collapse" data-target="#dados_militares1">Dados do Militar</div>
            <div class = "panel-body collapse in" id="dados_militares1">
                <div class="form-group col-xs-12 col-sm-6 col-md-2">
                    <label for="pg">Posto/Grad</label>
                    <select class="form-control" id="pg" name="pg">
                        <option value='' disabled selected>Selecione o Posto/Grad</option>
                        {foreach $relacao_posto_grad as $pg}
                            <option value={$pg.id_posto_grad}{if {$pg.id_posto_grad} == {$id_pg}} selected {/if}>{$pg.sigla}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="nome_completo">Nome Completo</label>
                    <input class="form-control" type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo"  maxlength="100" value="{$nome_completo}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="nome">Nome de Guerra</label>
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome de Guerra"  maxlength="20" value="{$nome}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input class="form-control data" type="text" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento"  maxlength="20" value="{$data_nascimento}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="idt_militar">Identidade Militar</label>
                    <input class="form-control" type="text" id="idt_militar" name="idt_militar" placeholder="Identidade Militar"  maxlength="11" value="{$idt_militar}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF"  maxlength="11" value="{$cpf}"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="estado">Estado Natal</label>
                    <select class="form-control estado1 js-example-responsive custom-select" id="estado_natal" name="estado_natal">
                        <option value='' disabled selected>Selecione o Estado</option>
                        {foreach $relacao_estados as $estados}
                            <option value={$estados.id_estado}{if {$estados.id_estado} == {$estado_nascimento}} selected {/if}>{$estados.uf} - {$estados.nome}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-3">
                    <label for="cidade">Cidade Natal</label>
                    {if $update > 0}
                        <select class='form-control js-example-responsive custom-select' name='cidade_natal' id='cidade_natal' required='required'>
                            <option value='' disabled selected>Selecione a Cidade</option>
                            {foreach $relacao_cidades as $cidades}
                                <option value={$cidades.id_cidade}{if {$cidades.id_cidade} == {$cidade_nascimento}} selected {/if}>{$cidades.nome}</option>
                            {/foreach}
                        </select>
                    </div>
                {else}
                    <select class="form-control cidade1 js-example-responsive custom-select" id="cidade_natal" name="cidade_natal">
                        <option value='' disabled selected>Selecione o Estado</option>
                    </select>
                </div>
            {/if}
        </div>
</div>
<div class="form-group col-xs-12 col-sm-12 col-md-12">
    <input type='hidden' id='id_militar' name='id_militar' value='{$id_militar}' />
    <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar">{$botao}</button>
</div>
</form>
{* <script>
    $(document).ready(function () {
        $('#estado_natal').change(function () {
            console.log('teste');
            console.log($('#estado_natal').val());
            var id_estado = $('#estado_natal').val();
            $.ajax({
                url: '/buscadorcidades',
                type: 'POST',
                data: {estado: id_estado},
                success: function (data) {
                    $('#cidade_natal').html(data);
                    $('#cidade_natal').select2();
                }
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script> *}