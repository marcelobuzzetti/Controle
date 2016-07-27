<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
        <h1>{$km} Km Rodados</h1>
    </div>
    <table id="detalhes" class="table table-striped table-hover table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Posto/Grad</td>
                <td>Nome de Guerra</td>
                <td>Nome Completo</td>
                <td>Categoria</td>
                <td>Validade</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_motoristas_cadastrados as $tbl name=relacao_motoristas}
            <td>{$tbl.sigla}</td>
            <td>{$tbl.nome}</td>
            <td>{$tbl.nome_completo}</td>
            <td>{$tbl.categoria}</td>
            <td>{$tbl.validade}</td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_motorista}" data-sigla="{$tbl.sigla}" data-nome="{$tbl.nome}" data-categoria="{$tbl.categoria}"><span class='glyphicon glyphicon-remove-sign'</button></td>
            <td><form action='motorista' method='post'>
                    <input type='hidden' id='{$tbl.id_motorista}' value='{$tbl.id_motorista}' name='id'/>
                    <button class='btn btn-success' type='submit' id='apagar' name='enviar' value="atualizar_motorista"/><span class='glyphicon glyphicon-refresh'/></form></td>
            </form>
            </tr> 
        {/foreach}
        </tbody>
    </table>
    <legend>Percursos Realizados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
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
        </thead>
        <tbody>
            {foreach $relacao_percursos as $tbl name=relacao_relatorio}
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
        </tfoot>
    </table>
    <legend>Vtr que utilizou</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
                <td>Km Rodada</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_viaturas as $tbl name=relacao_relatorio}
                <tr>
                    <td>{$tbl.viatura}</td>
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
                <td>Km</td>
            </tr>
        </tfoot>
    </table>
    <legend>Acidentes</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
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
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
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
                <td>Viatura</td>
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
                <td>Viatura</td>
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
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
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
                <td>Viatura</td>
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