<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <table id="detalhes" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Placa</td>
                <td>Odômetro Atual</td>
                <td>Capacidade do Tanque</td>
                <td>Consumo Km/L</td>
                <td>Capacidade(Pessoas)</td>
                <td>Habilitação Necessária</td>
                <td>Situação</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_viaturas as $tbl name='viaturas'}
                <tr>
                    <td>{$tbl.marca}</td>
                    <td>{$tbl.modelo}</td>
                    <td>{$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.cap_tanque}</td>
                    <td>{$tbl.consumo_padrao}</td>
                    <td>{$tbl.cap_transp}</td>
                    <td>{$tbl.categoria}</td>
                    <td>{$tbl.disponibilidade}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td><form action='viatura' method='post'>
                            <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                            <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form>
                </tr>
            {/foreach}  
        </tbody>
    </table>
    <legend>Percursos Realizados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
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
        </thead>
        <tbody>
            {foreach $relacao_percursos as $tbl name=relacao_relatorio}
                <tr>
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
        </tfoot>
    </table>
    <legend>Motoristas que utilizaram a Vtr</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
                <td>Km</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_motoristas as $tbl name=relacao_relatorio}
                <tr>
                    <td>{$tbl.apelido}</td>
                    <td>{$tbl.nome_destino}</td>
                    <td>{$tbl.odo_saida}</td>
                    <td>{$tbl.data_saida}</td>
                    <td>{$tbl.hora_saida}</td>
                    <td>{$tbl.odo_retorno}</td>
                    <td>{$tbl.data_retorno}</td>
                    <td>{$tbl.hora_retorno}</td>
                    <td>{$tbl.KM}</td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
                <td>Km Rodada</td>
            </tr>
        </tfoot>
    </table>
        <legend>Alterações</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_alteracao as $tbl}
                <tr>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.data}</td>
                </tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
            </tr>
        </tfoot>
    </table>
    <legend>Manutenções Realizadas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_manutencao as $tbl name=relacao_mnt_vtr}
                <tr>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.data}</td>
                </tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data</td>
            </tr>
        </tfoot>
    </table>
    <legend>Acidentes</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Motorista</td>
                <td>Acompanhante</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_acidentes as $tbl name=relacao_acidentes}
                <tr>
                    <td>{$tbl.motorista}</td>
                    <td>{$tbl.acompanhante}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.data}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.avarias}</td>
                </tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Motorista</td>
                <td>Acompanhante</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
            </tr>
        </tfoot>
    </table>
    <legend>Abastecimentos</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Nº Vale</td>
                <td>Motorista</td>
                <td>Odômetro</td>
                <td>Combustível</td>
                <td>Tipo</td>
                <td>Quantidade</td>
                <td>Data</td>
                <td>Hora</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_abastecimentos as $tbl name=tabela_relacao_abastecimentos}
                <tr>
                    <td>{$tbl.nrvale}</td>
                    <td>{$tbl.apelido}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.combustivel}</td>
                    <td>{$tbl.tipo}</td>
                    <td>{$tbl.qnt}</td>
                    <td>{$tbl.data}</td>
                    <td>{$tbl.hora}</td>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Nº Vale</td>
                <td>Motorista</td>
                <td>Odômetro</td>
                <td>Combustível</td>
                <td>Tipo</td>
                <td>Quantidade</td>
                <td>Data</td>
                <td>Hora</td>
            </tr>
        </tfoot>
    </table>
</div>