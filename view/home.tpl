<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6" >        
                <form class="form-inline" action="./model/executar.php" method="post">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input autofocus type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
                    </div>
                    <button type="submit" value="login" name="enviar" class="btn btn-default">Login</button>
                </form>  
            </div>
        </div>
    </div>
</div>
<div class="wrapper" role="main">
    <div class='container-fluid'>
        <div class="row">
            <div class="table-responsive" >
                <fieldset>
                    <legend>Viaturas Rodando</legend>
                    <table class='table' text-align='center'>
                        <tr>
                            <td>Ordem</td>
                            <td>Viatura</td>
                            <td>Motorista</td>
                            <td>Destino</td>
                            <td>Odômetro Saída</td>
                            <td>Acompanhante</td>
                            <td>Data Saída</td>
                            <td>Hora Saída</td>
                        </tr>
                        {foreach $tabela_relacao_vtr as $vtr name='vtr'}
                            <tr>
                                <td>{$smarty.foreach.vtr.iteration}</td>
                                <td>{$vtr.marca} - {$vtr.modelo} - {$vtr.placa}</td>
                                <td>{$vtr.apelido}</td>
                                <td>{$vtr.nome_destino}</td>
                                <td>{$vtr.odo_saida}</td>
                                <td>{$vtr.acompanhante}</td>
                                <td>{$vtr.data_saida}</td>
                                <td>{$vtr.hora_saida}</td>
                            </tr>
                        {/foreach}    
                    </table>  
                    </body>
                    </html>