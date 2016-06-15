<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este Acidente?
            </div>
            <div class="modal-footer">
                <form action='executar' method='post'>
                    <input type="hidden" class="form-control" id="recipient-name"  name='id'/>
                    <button type="submit" class="btn btn-danger" name='enviar' value="apagar_acidente">Sim</button>
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
    </div>
    <form autocomplete="off" action="executar" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="viatura">Viatura - Placa</label>
            <select class="form-control" name="viatura_acidente" id="viatura_acidente" required="required" tabindex="1">
                <option value='' disabled selected>Selecione a Viatura</option>
                {foreach $relacao_viaturas as $viatura}
                    <option value={$viatura.id_viatura} {if {$viatura.id_viatura} == {$id_viatura}}selected{/if}>{$viatura.marca} - {$viatura.modelo} - {$viatura.placa}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-3">
            <label for="motorista">Motorista</label>
            <select class="form-control" id="motorista" name="motorista" required="required" tabindex="2">
                <option value='' disabled selected>Selecione o Motorista</option>
                {foreach $relacao_motoristas as $motoristas}
                    <option value={$motoristas.id_motorista} {if {$motoristas.id_motorista} == {$id_motorista}}selected{/if}>{$motoristas.apelido}</option>
                {/foreach}
            </select>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="acompanhante">Acompanhante</label>
            <input class="form-control" type="text"  id="acompanhante" name="acompanhante" placeholder="Acompanhante" value='{$acompanhante}' tabindex="3"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="odometro">Odômetro</label>
            <input class="form-control" type="number" id="odometro" name="odometro" placeholder="Odometro" required="required" value='{$odometro}'  step="0.1" min="0" tabindex="4"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-2">
            <label for="data">Data</label>
            <input class="form-control" type="text" id="data" name="data"  required="required" value='{$data}' placeholder='Data Acidente' tabindex="5"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="acidente">Descrição do Acidente</label>
            <textarea class="form-control" rows="10" id="acidente" name="acidente" placeholder="Descrição do Acidente" required='required'  tabindex="6">{$descricao}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('acidente');
            CKEDITOR.add
        </script>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="avarias">Descrição das Avarias</label>
            <textarea class="form-control" rows="10" id="avarias" name="avarias" placeholder="Descrição das Avarias" required='required'  tabindex="7">{$avarias}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('avarias');
            CKEDITOR.add
        </script>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type='hidden' value='{$id_acidente_viatura}' name='id'/>
            <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="{$evento}" name="enviar" tabindex="8">{$botao}</button>
        </div>
    </form>
</div>
<div class='container'>
    {if $cadastrado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O Acidente foi adicionado com sucesso!
        </div>              
    {/if}
    {if $atualizado != NULL}
        <div class="alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O Acidente foi fechada com sucesso!
        </div>              
    {/if}
    {if $apagado != NULL}
        <div class="alert alert-danger alert-dismissible col-xs-12 col-sm-12 col-md-12">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            O Acidente foi apagado com sucesso!
        </div>              
    {/if}
</div>
<div class="container">
    <legend>Acidentes</legend>
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Acompanhante</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_acidentes as $tbl name=relacao_acidentes}
                <tr>
                    <td>{$tbl.marca} - {$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.motorista}</td>
                    <td>{$tbl.acompanhante}</td>
                    <td>{$tbl.odometro}</td>
                    <td>{$tbl.data}</td>
                    <td>{$tbl.descricao}</td>
                    <td>{$tbl.avarias}</td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{$tbl.id_acidente_viatura}"><span class='glyphicon glyphicon-remove-sign'</button></td>
                    <td> <form action='acidentevtr' method='post'>
                            <input type='hidden' id='{$tbl.id_acidente_viatura}' value='{$tbl.id_acidente_viatura}' name='id'/><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_acidente'/><span class='glyphicon glyphicon-refresh'/></form></td>
                    </form></tr>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Motorista</td>
                <td>Acompanhante</td>
                <td>Odômetro</td>
                <td>Data</td>
                <td>Descrição do Acidente</td>
                <td>Avarias</td>
                <td>Apagar</td>
                <td>Atualizar</td>
            </tr>
        </tfoot>
    </table>
</div>