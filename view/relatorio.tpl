{if $verificador == 1}
    <div class='container'>
        <div class="jumbotron">
            <h1 class="titulo">{$titulo1}</h1>
        </div>
        <table id="relatorio" class="relatorio table table-striped table-hover table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Viatura</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante(s)</td>
                    <td>Data Saída</td>
                    <td>Hora Saída</td>
                    <td>Usuário que Anotou Saída</td>
                    <td>Odômetro Retorno</td>
                    <td>Data Chegada</td>
                    <td>Hora Chegada</td>
                    <td>Usuário que Anotou Chegada</td>
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
                        <td>{$tbl.usuario_saida}</td>
                        <td>{$tbl.odo_retorno}</td>
                        <td>{$tbl.data_retorno}</td>
                        <td>{$tbl.hora_retorno}</td>
                        <td>{$tbl.usuario_retorno}</td>
                    </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr>
                    <td>Viatura</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante(s)</td>
                    <td>Data Saída</td>
                    <td>Hora Saída</td>
                    <td>Usuário que Anotou Saída</td>
                    <td>Odômetro Retorno</td>
                    <td>Data Chegada</td>
                    <td>Hora Chegada</td>
                    <td>Usuário que Anotou Chegada</td>
                </tr>
            </tfoot>
        </table>
        <legend>Viaturas em Atividade no Momento</legend>
        <table id="tabela" class="relatorio table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Viatura</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante(s)</td>
                    <td>Data e Hora da Saída</td>
                    <td>Usuário que Anotou Saída</td>
                </tr>
            </thead>
            <tbody>
                {foreach $tabela_relacao_vtr as $vtr name='vtr'}
                    <tr>
                        <td>{$vtr.marca} - {$vtr.modelo} - {$vtr.placa}</td>
                        <td>{$vtr.apelido}</td>
                        <td>{$vtr.nome_destino}</td>
                        <td>{$vtr.odo_saida}</td>
                        <td>{$vtr.acompanhante}</td>
                        <td>{$vtr.data_saida} {$vtr.hora_saida}</td>
                        <td>{$vtr.usuario_saida}</td>
                    </tr>
                {/foreach}     
            </tbody>
            <tfoot>
                <tr>
                    <td>Viatura</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante(s)</td>
                    <td>Data e Hora da Saída</td>
                    <td>Usuário que Anotou Saída</td>
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
            <input class="form-control" type="text" id="data_inicio" name="data_inicio" placeholder='Digite a Data de início do Relatório' required="required" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="data_fim">Data Fim</label>
            <input class="form-control" type="text" id="data_fim" name="data_fim" placeholder='Digite a Data final do Relatório' required="required" tabindex="2"/>
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