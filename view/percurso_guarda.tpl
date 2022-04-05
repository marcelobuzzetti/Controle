<!--Modal-->
<div class="modal fade" id="modalpercurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Percurso?
                <div class="nome">
                    <div class="input-group">
                        <div class="input-group-addon">Motorista</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="vtr">
                    <div class="input-group">
                        <div class="input-group-addon">Viatura</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="destino">
                    <div class="input-group">
                        <div class="input-group-addon">Destino</div>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action='executar' method='post' autocomplete="off" id="apagar">
                    <input type="hidden" name="csrf" id="csrf" value="{$token}">
                    <input type="hidden" id="enviar" value="Apagar_guarda" name="enviar"/>
                    <input type="hidden" class="form-control 1" id="recipient-name" name='id'/>
                    <input type="text" class="form-control" id="motivo_apagado" name='motivo_apagado' required placeholder="Digite o motivo para apagar" value="" autofocus/>
                    <input type="text" class="form-control" name="usuario" required placeholder="Digite o Usuário" onkeyup="handleChange(event)">
                    <input type="password" class="form-control" name="senha" required placeholder="Digite a Senha" onkeyup="handleChange(event)">
                    <button type="submit" class="btn btn-danger" name='enviar' value="Apagar_guarda" onclick="test(event, 'apagar')">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Nao</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class='container'>
    {if ($dados)}
    <script>toastr.error("{$dados}")</script>
        <!-- <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O percurso foi adicionado com sucesso!
        </div>               -->
    {/if}
    {if ($cadastrado)}
    <script>toastr.success('O percurso foi adicionado com sucesso!')</script>
        <!-- <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O percurso foi adicionado com sucesso!
        </div>               -->
    {/if}
    {if ($atualizado)}
    <script>toastr.success('A viatura foi fechada com sucesso!')</script>
        <!-- <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            A viatura foi fechada com sucesso!
        </div>               -->
    {/if}
    {if $apagado != NULL}
    <script>toastr.error('O percurso foi apagado com sucesso!')</script>
        <!-- <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O percurso foi apagado com sucesso!
        </div>               -->
    {/if}
    {if $erro2 != NULL}
        <script>toastr.error('Houve um erro ao tentar retornar a Vtr!')</script>
    {/if}
    {if $erro1 != NULL}
    <script>toastr.error('Houve um erro ao tentar registrar saída de Vtr!')</script>
    {/if}
    {if $erro3 != NULL}
    <script>toastr.error('Houve um erro ao tentar apagar o registro!')</script>
    {/if}
</div>
<div class='container'>
    <div class="jumbotron">
        <h1>Controle de Saída de Viatura - Anotador</h1>     
    </div>
    <!--<div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="RFID">RFID</label>
            <input class="form-control" type="text" id="rfid" name="rfid" placeholder="RFID" autofocus tabindex="-1"/>            
    </div>-->
    <form autocomplete="off" id="guarda" method='post' action="executar" onsubmit="test(event, 'guarda')">
        <input type="hidden" name="csrf" id="csrf" value="{$token}">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="viatura">Viatura - Placa</label>
            <select class="js-example-responsive custom-select form-control " name="viatura" id="viatura" required="required" tabindex="1" onchange="handleChange(event)">
                <option value='' disabled selected>Selecione a Viatura</option>
                {foreach $relacao_viaturas as $viatura}
                    <option value={$viatura.id_viatura}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="motorista">Motorista</label>
            <select class="form-control js-example-responsive custom-select " name="motorista" id="motorista" required="required" tabindex="2" onchange="handleChange(event)">
                <option value='' class="Selecione" disabled selected>Selecione a Viatura</option>
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="destino">Destino</label>
            <input class="form-control" type="text" id="destino" name="destino" placeholder="Destino" required="required" maxlength="30" tabindex="3" onchange="handleChange(event)"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="odo_saida">Odômetro Saída</label>
            <input class="form-control" type="number" id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1" min="0" tabindex="4" onchange="handleChange(event)"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="acompanhante">Acompanhante(s)</label>
            <input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante(s)" tabindex="5" onchange="handleChange(event)"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="usuario">Usuário</label>
            <input class="form-control" type="text"  id="usuario" name="usuario" placeholder="Digite o seu Usuario" tabindex="6" required onkeyup="handleChange(event)"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="senha">Senha</label>
            <input class="form-control" type="password"  id="senha" name="senha" placeholder="Digite a sua Senha" tabindex="7" required onkeyup="handleChange(event)"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type="hidden" id="enviar" value="percurso_guarda" name="enviar"/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" value="Cadastrar" tabindex="8">Cadastrar</button>
        </div>
    </form>
</div>
<div class='container table-responsive grafico'>
    <legend>Viaturas Rodando</legend>
    <table class='table table-striped table-hover' text-align='center'>
        <tr>
            <td>Ordem</td>
            <td>Viatura</td>
            <td>Motorista</td>
            <td>Destino</td>
            <td>Odômetro Saída</td>
            <td>Acompanhante(s)</td>
            <td>Data e Hora da Saída</td>
            <td>Odômetro Chegada</td>
            <td>Usuário e Senha</td> 
            <td colspan="2">Ações</td> 
        </tr>
        {foreach $tabela_relacao_vtr as $tbl name=relacao_vtr}
            <tr><form action='executar' method='post' id="lista_vtr" onsubmit="test(event, 'lista_vtr')">
                <input type='hidden' readonly='readonly' name='id' value="{$tbl.id_percurso}"/>
                <input type="hidden" name="csrf" value="{$token}">
                <input type="hidden" id="enviar" value="percurso_retornou_guarda" name="enviar"/>
                <td>{$smarty.foreach.relacao_vtr.iteration}</td>
                <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                <td>{$tbl.apelido}</td>
                <td>{$tbl.nome_destino}</td>
                <td>{$tbl.odo_saida}</td>
                <td>{$tbl.acompanhante}</td>
                <td>{$tbl.data_saida} {$tbl.hora_saida}</td>
                <td><input class='form-control' type='number' placeholder='Min {$tbl.odo_saida}' name='odo_retorno'  id='{$tbl.id_viatura}' required='required'  step="0.1" min="{$tbl.odo_saida}" onchange="handleChange(event)" onkeydown="handleChange(event)"/></td>
                <td>
                    <input class="form-control" type="text"  id="usuario" name="usuario" placeholder="Usuário" required onkeyup="handleChange(event)"/>
                    <br/>
                    <input class="form-control" type="password"  id="senha" name="senha" placeholder="Senha" required onkeyup="handleChange(event)"/>
                </td>
                <td><button type="submit" class='btn btn-success'>Retornou</button></form></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalpercurso" data-whatever="{$tbl.id_percurso}" data-destino="{$tbl.nome_destino}" data-nome="{$tbl.apelido}" data-vtr="{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}"><span class='glyphicon glyphicon-remove'/></button></td>
            </tr>
        {/foreach}    
    </table>
</fieldset>
</div>
<div class='container tabela'>
    <legend>Viaturas Rodando</legend>
    <table class='table table-striped table-hover' text-align='center'>
        {foreach $tabela_relacao_vtr as $tbl name=relacao_vtr}
            <tr>
                <form action='executar' method='post' id="lista_vtr1" onsubmit="test(event, 'lista_vtr1')">
                <input type='hidden' readonly='readonly' name='id' value="{$tbl.id_percurso}"/>
                <input type="hidden" name="csrf" value="{$token}">
                <input type="hidden" id="enviar" value="percurso_retornou_guarda" name="enviar"/>
                <td>Ordem {$smarty.foreach.relacao_vtr.iteration}</td>
                </tr>
                <tr>
                    <td>Viatura {$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                </tr>
                <tr>
                    <td>Motorista {$tbl.apelido}</td>
                </tr>
                <tr>
                    <td>Destino {$tbl.nome_destino}</td>
                </tr>
                <tr>
                    <td>Odômetro Saída {$tbl.odo_saida}</td>
                </tr>
                <tr>
                    <td>Acompanhante(s) {$tbl.acompanhante}</td>
                </tr>
                <tr>
                    <td>Data e Hora da Saída {$tbl.data_saida} {$tbl.hora_saida}</td>
                </tr>
                <tr>
                    <td>Odômetro Chegada <input class='form-control' type='number' placeholder='Min {$tbl.odo_saida}' name='odo_retorno'  id='{$tbl.id_viatura}' required='required'  step="0.1" min="{$tbl.odo_saida}" onchange="handleChange(event)" onkeydown="handleChange(event)"/></td>
                </tr>
                <tr>
                    <td>Usuário <input class="form-control" type="text"  id="usuario" name="usuario" placeholder="Usuário" required onchange="handleChange(event)" onkeydown="handleChange(event)"/>
                    <br/>
                    Senha <input class="form-control" type="password"  id="senha" name="senha" placeholder="Senha" required onchange="handleChange(event)" onkeydown="handleChange(event)"/>
                </td>
                <tr>
                    <td>Ações</td> 
                </tr>
                <tr>
                    <td><button type="submit" class='btn btn-success'>Retornou</button></form></td>
                </tr>
                <tr>
                <td><button type="button" class="btn btn-danger col-xs-12 col-sm-12 col-md-12" data-toggle="modal" data-target="#modalpercurso" data-whatever="{$tbl.id_percurso}" data-destino="{$tbl.nome_destino}" data-nome="{$tbl.apelido}" data-vtr="{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}"><span class='glyphicon glyphicon-remove'/></button></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        {/foreach}    
    </table>
</fieldset>
</div>
<div class="container">
    <legend>10 últimas viaturas fechadas</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Destino</td>
                <td>Odômetro Saída</td>
                <td>Acompanhante(s)</td>
                <td>Data e Hora da Saída</td>
                <td>Odômetro Retorno</td>
                <td>Data e Hora da Chegada</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_relacao_vtr_fechadas as $tbl1 name=relacao_vtr_fechadas}
                <tr>
                    <td>{$tbl1.marca} - {$tbl1.modelo} - {$tbl1.placa}</td>
                    <td>{$tbl1.apelido}</td>
                    <td>{$tbl1.nome_destino}</td>
                    <td>{$tbl1.odo_saida}</td>
                    <td>{$tbl1.acompanhante}</td>
                    <td>{$tbl1.data_saida} {$tbl1.hora_saida}</td>
                    <td>{$tbl1.odo_retorno}</td>
                    <td>{$tbl1.data_retorno} {$tbl1.hora_retorno}</td>
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
                <td>Odômetro Retorno</td>
                <td>Data e Hora da Chegada</td>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    let dados = [];
    const csrf = '{$token}';

    const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    dados = { ...dados, [name]: value };
    console.log(dados)
    }

    function test(event, form) {
    event.preventDefault();
    dados = { ...dados, token: csrf };
    axios.post('/testeuser', {
        ...dados,
    })
        .then(function (response) {
        if(response.status === 200){
            document.getElementById(form).submit();
        }
        })
        .catch(function (error) {
        toastr.error('Usuário Não Existe!');
        });
    }
</script>