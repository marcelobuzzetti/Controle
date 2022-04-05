<div class="container">
    <div class="jumbotron">
        <h1>Viaturas em Atividade no Momento</h1>
    </div>
    {* <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante(s)</td>
                <td>Data e Hora da Saída</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_relacao_vtr as $vtr name='vtr'}
                <tr class="teste">
                    <td>{$vtr.marca} - {$vtr.modelo} - {$vtr.placa}</td>
                    <td>{$vtr.apelido}</td>
                    <td>{$vtr.nome_destino}</td>
                    <td>{$vtr.odo_saida}</td>
                    <td>{$vtr.acompanhante}</td>
                    <td>{$vtr.data_saida} {$vtr.hora_saida}</td>
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
            </tr>
        </tfoot>
    </table>
    <hr> *}
     <button class='btn btn-success' id="refresh"><span class='glyphicon glyphicon-refresh'/></button>
     <table id="ajax" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante(s)</td>
                <td>Data e Hora da Saída</td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante(s)</td>
                <td>Data e Hora da Saída</td>
            </tr>
        </tfoot>
    </table>
</div>
