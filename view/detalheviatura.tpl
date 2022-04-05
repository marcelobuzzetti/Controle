<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Alteração?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name"  name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_disponibilidade">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
        <a href="{$data}" download="{$nome_imagem}">
              <img class="img-responsive center-block" src="{$data}" />
          </a>
          <p class="text-center">
            <a class="btn btn-primary" href="{$data}" download="{$nome_imagem}">Download</a>
            <button class="btn btn-info" onclick="printImg('{$data}')">Imprimir</button>
          </p>
    </div>
    <table id="detalhes" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Tipo de Viatura</td>
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
                    <td>{$tbl.tipo_viatura}</td>
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
    <hr>
    <legend>Percursos Realizados</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante(s)</td>
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
                <td>Acompanhante(s)</td>
                <td>Data Saída</td>
                <td>Hora Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data Chegada</td>
                <td>Hora Chegada</td>
            </tr>
        </tfoot>
    </table>
    <hr>
    <legend>Indisponibilidades</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data Início</td>
                <td>Apagar/Resolver</td>
                <td>Data Fim</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_disponibilidade as $tbl}
                <tr>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.data}</td>
                    {if $tbl.id_status == 1}
                     <td><form action='executar' method='post'><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_disponibilidade}"><span class='glyphicon glyphicon-remove-sign' title='Apagar'></button>
                            <input type='hidden' id='{$tbl.id_disponibilidade}' value='{$tbl.id_disponibilidade}' name='id'/>
                            <input type='hidden' value='{$tbl.id_viatura}' name='id_viatura'/>
                            <button class='btn btn-success' type='submit' id='resolver' name='enviar' value='atualiza_disponibilidade' title='Resolver'>
                                <span class='glyphicon glyphicon-refresh'></span>
                            </button>
                        </form></td>
                    {else}
                    <td>Resolvido</td>
                    {/if}
                    <td>{$tbl.data_fim}</td>
                    </form></tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Odômetro</td>
                <td>Descrição</td>
                <td>Data Início</td>
                <td>Apagar/Resolver</td>
                <td>Data Fim</td>
            </tr>
        </tfoot>
    </table>
    <hr>
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
    <hr>
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
    <hr>
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
    <hr>
    <legend>Acidentes</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap detalhes" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Motorista</td>
                <td>Acompanhante(s)</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Disponibilidade</td>
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
                    <td>{$tbl.disponibilidade}</td>
                </tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Motorista</td>
                <td>Acompanhante(s)</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Disponibilidade</td>
            </tr>
        </tfoot>
    </table>
    <hr>
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
<script>
 function printImg(url) {
          var win = window.open('');
          win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
          win.focus();
        }
</script>