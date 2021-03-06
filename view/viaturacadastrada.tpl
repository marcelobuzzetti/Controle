<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esta Viatura?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name" name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_viatura">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Alertas-->
{if ($cadastrado)}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi cadastrada com sucesso!
        </div>              
    </div>
{/if}
<!--{if ($ativado)}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi ativada com sucesso!
        </div>              
    </div>
{/if}-->
{if ($atualizado)}
    <div class='container'>
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi atualizada com sucesso!
        </div>  
    </div>
{/if}
{if ($apagado)}
    <div class='container'>
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi apagada com sucesso!
        </div>              
    </div>
{/if}
{if ($erro)}
    <div class='container'>
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Não foi possível acessar o BD
        </div>    
    </div>
{/if}
<!--Alertas-->
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <div class="container">
        <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                    <td>RFID</td>
                    <td>Situação</td>
                    <td>Detalhes</td>
                    <td>Apagar</td>
                    <td>Atualizar</td>
                </tr>
            </thead>
            <tbody>
                {foreach $relacao_viaturas as $tbl name='viaturas'}
                    <tr {if {$tbl.disponibilidade} eq "Indisponível"} style="background: rgba(255, 0, 0, 0.3);" {/if} {if {$tbl.disponibilidade} eq "Cautelada"} style="background: rgba(254, 241, 96, 1);" {/if}>
                        <td>{$tbl.marca}</td>
                        <td>{$tbl.modelo}</td>
                        <td>{$tbl.tipo_viatura}</td>
                        <td>{$tbl.placa}</td>
                        <td>{$tbl.odometro}</td>
                        <td>{$tbl.cap_tanque}</td>
                        <td>{$tbl.consumo_padrao}</td>
                        <td>{$tbl.cap_transp}</td>
                        <td>{$tbl.categoria}</td>
                        <td>{$tbl.rfid}</td>
                        <td>{$tbl.disponibilidade}</td>
                        <td><form action='detalheviatura' method='post'>
                                <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                                <button class='btn btn-default' type='submit' id='detalhe' name='detalhe'/><span class='glyphicon glyphicon-zoom-in'/></form></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                        <td><form action='viatura' method='post'>
                                <input type='hidden' id='id' name='id' value='{$tbl.id_viatura}' />
                                <button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/><span class='glyphicon glyphicon-refresh'/></form></td>
                        </form>
                    </tr>
                {/foreach}  
            </tbody>
            <tfoot>
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
                    <td>RFID</td>
                    <td>Situação</td>
                    <td>Detalhes</td>
                    <td>Apagar</td>
                    <td>Atualizar</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>