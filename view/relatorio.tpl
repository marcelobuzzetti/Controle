{if $verificador == 1}
    <div class='container'>
        <div class="jumbotron">
            <h1>{$titulo1}</h1>
        </div>
        <div class="input-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group-addon">Pesquisar</div>
            <input type="text" class="form-control" id="pesquisa_relatorio" name="pesquisa_relatorio" placeholder="Digite aqui">
            <div class="input-group-addon"><span class='glyphicon glyphicon-search'/></div>
        </div>
        <p></p>
    </div>
    <div class='container table-responsive grafico' >
        <table class='table table-striped table-hover grafico' id="relatorio" text-align='center'>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
            </tr>
            {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                <tr>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.apelido}</td>
                    <td>{$tbl.destino}</td>
                    <td>{$tbl.odo_saida}</td>
                    <td>{$tbl.acompanhante}</td>
                    <td>{$tbl.data_saida}</td>
                    <td>{$tbl.hora_saida}</td>
                    <td>{$tbl.odo_retorno}</td>
                    <td>{$tbl.data_retorno}</td>
                    <td>{$tbl.hora_retorno}</td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>
<div class='container tabela'>
    <fieldset>                    
        <legend>Viaturas</legend>
        <table class='table table-hover table-striped'  id="relatorio1" text-align='center'>
            {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                <tr>
                    <td>Viatura: {$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                </tr>
                <tr>
                    <td>Motorista: {$tbl.apelido}</td>
                </tr>
                <tr>
                    <td>Destino: {$tbl.destino}</td>
                </tr>
                <tr>
                    <td>Odômetro Saída: {$tbl.odo_saida}</td>
                </tr>
                <tr>
                    <td>Acompanhante: {$tbl.acompanhante}</td>
                </tr>
                <tr>
                    <td>Data Saída: {$tbl.data_saida}</td>
                </tr>
                <tr>
                    <td>Hora Saída: {$tbl.hora_saida}</td>
                </tr>
                <tr>
                    <td>Odômetro Retorno: {$tbl.odo_retorno}</td>
                </tr>
                <tr>
                    <td>Data Chegada: {$tbl.data_retorno}</td>
                </tr>
                <tr>
                    <td>Hora Chegada: {$tbl.hora_retorno}</td>
                </tr>
                <tr><td></td></tr>
            {/foreach}
        </table>
    </fieldset>
</div>
{/if}
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="relatorio" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="data_inicio">Data Início</label>
            <input class="form-control" type="text" id="data_inicio" name="data_inicio"  required="required" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="data_fim">Data Fim</label>
            <input class="form-control" type="text" id="data_fim" name="data_fim"  required="required" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <button type="submit" disabled class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="relatorio" name="enviar" tabindex="3">Gerar Relatório por Data</button>
        </div>
    </form>
</div>
<div class=" container">
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <form action="relatorio" method="post">
            <button type="submit" class="btn btn-success col-xs-12 col-sm-12 col-md-12" id="enviar_completo" value="relatorio_completo" name="enviar" tabindex="3">Gerar Relatório Completo</button>
        </form>
    </div>
</div>