<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/percurso">Controle</a>
        </div>
        <div class='container'>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-collapse" autocomplete="off" action="./model/executar.php" method="post">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input autofocus type="text" class="form-control" id="usuario" name="login" placeholder="Digite seu usuário" tabindex="1">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha" tabindex="2">
                    </div>
                    <button type="submit" value="login" name="enviar" class="btn btn-default" tabindex="3">Login</button>
                </form>  
            </div>
            </nav>
        </div>
        <div class="wrapper" role="main">
            <div class='container'>
                <div class="jumbotron">
                    <h1>Viaturas Rodando</h1>
                    <div class="table-responsive col-xs-12 col-sm-12 col-md-12" >
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
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
