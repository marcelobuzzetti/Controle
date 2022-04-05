<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand tabela" href="/percurso">Controle</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1001">Viaturas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/viaturascadastradas">Viaturas Cadastradas</a></li>
                        <li><a href="/alteracaovtrcadastrada">Alterações de Viaturas Cadastradas</a></li>
                        <li><a href="/alteracaovtr">Cadastrar Alteração de Viatura</a></li>
                        <li><a href="/manutencaovtrcadastrada">Manutenções de Viaturas Cadastradas</a></li>
                        <li><a href="/manutencaovtr">Cadastrar Manutenção de Viatura</a></li>
                        <li><a href="/acidentevtrcadastrado">Acidentes de Viaturas Cadastrados</a></li>
                        <li><a href="/acidentevtr">Cadastrar Acidente de Viatura</a></li>
                        <li><a href="/marcacadastrada">Marcas Cadastradas</a></li>
                        <li><a href="/marca">Cadastrar Marca</a></li>
                        <li><a href="/modelocadastrado">Modelos Cadastrados</a></li>
                        <li><a href="/modelo">Cadastrar Modelo</a></li>
                        <li><a href="/viatura">Cadastrar Viatura</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1002">Motoristas<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/motorista">Cadastrar Motorista</a></li>
                        <li><a href="/motoristascadastrados">Motoristas Cadastrados</a></li>
                        <li><a href="/motoristasinativos">Motoristas Inativos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1003">Combustíveis <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/combustiveldisponivel">Combustível Disponível</a></li>
                        <li><a href="/combustiveiscadastrados">Combustíveis Cadastrados</a></li>
                        <li><a href="/combustivel">Cadastrar Combustível</a></li>
                        <li><a href="/tiposcombustiveiscadastrados">Tipos de Combustíveis Cadastrados</a></li>
                        <li><a href="/tipocombustivel">Cadastrar Tipo de Combustível</a></li>
                        <li><a href="/recebimentocombustivelcadastrado">Recebimento de Combustível Cadastrado</a></li>
                        <li><a href="/recebimentocombustivel">Cadastrar Recebimento de Combustível</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1004">Abastecimento<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/abastecimentorealizado">Abastecimentos Realizados</a></li>
                        <li><a href="/abastecimento">Abastecer Vtr?</a></li>
                        <li><a href="/abastecimentoespecial">Pagar combustível?</a></li>
                    </ul>
                </li>                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1006">Relatórios<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/relatorio" >Relatório de Utilização Vtr por Data</a></li>
                        <li><a href="/relatoriocombustivel" >Relatório de Abastecimentos</a></li>
                        <li><a href="/relatoriovtr" >Relatório de Utilização de Vtr</a></li>
                        <li><a href="/relatoriomotorista" >Relatório de Utilização de Motorista</a></li>
                        <li><a href="/viaturasindisponiveis" >Gráfico Disponibilidade/Indisponibilidade Vtr</a></li>
                    </ul>
                </li>
                <li><a href="/alterarusuario" tabindex="1007">Olá {$login}</a></li>
                <li><a href="/logout" tabindex="1008">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	