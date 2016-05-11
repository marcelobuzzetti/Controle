{if $verificador == 1}
    <div class='container'>
        <div class="jumbotron">
            <h1>{$titulo1}</h1>
        </div>
        <table id="relatorio" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Viatura</th>
                    <th>Motorista</th>
                    <th>Destino</th>
                    <th>Odômetro Saída</th>
                    <th>Acompanhante</th>
                    <th>Data Saída</th>
                    <th>Hora Saída</th>
                    <th>Odômetro Retorno</th>
                    <th>Data Chegada</th>
                    <th>Hora Chegada</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
            <tfoot>
                <tr>
                    <th>Viatura</th>
                    <th>Motorista</th>
                    <th>Destino</th>
                    <th>Odômetro Saída</th>
                    <th>Acompanhante</th>
                    <th>Data Saída</th>
                    <th>Hora Saída</th>
                    <th>Odômetro Retorno</th>
                    <th>Data Chegada</th>
                    <th>Hora Chegada</th>
                </tr>
            </tfoot>
        </table>
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