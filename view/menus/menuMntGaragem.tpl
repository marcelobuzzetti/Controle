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
                        <li><a href="{$HOST}/viaturascadastradas">Viaturas Cadastradas</a></li>
                        <li><a href="{$HOST}/alteracaovtrcadastrada">Alterações de Viaturas Cadastradas</a></li>
                        <li><a href="{$HOST}/alteracaovtr">Cadastrar Alteração de Viatura</a></li>
                        <li><a href="{$HOST}/manutencaovtrcadastrada">Manutenções de Viaturas Cadastradas</a></li>
                        <li><a href="{$HOST}/manutencaovtr">Cadastrar Manutenção de Viatura</a></li>
                        <li><a href="{$HOST}/acidentevtrcadastrado">Acidentes de Viaturas Cadastrados</a></li>
                        <li><a href="{$HOST}/acidentevtr">Cadastrar Acidente de Viatura</a></li>
                        <li><a href="{$HOST}/marcacadastrada">Marcas Cadastradas</a></li>
                        <li><a href="{$HOST}/marca">Cadastrar Marca</a></li>
                        <li><a href="{$HOST}/modelocadastrado">Modelos Cadastrados</a></li>
                        <li><a href="{$HOST}/modelo">Cadastrar Modelo</a></li>
                        <li><a href="{$HOST}/viatura">Cadastrar Viatura</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1002">Motoristas<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/motorista">Cadastrar Motorista</a></li>
                        <li><a href="{$HOST}/motoristascadastrados">Motoristas Cadastrados</a></li>
                        <li><a href="{$HOST}/motoristasinativos">Motoristas Inativos</a></li>
                    </ul>
                </li>
                <li><a href="{$HOST}/combustiveldisponivel">Combustível Disponível</a></li>
                <li class="dropdown">
                <li><a href="{$HOST}/abastecimentorealizado">Abastecimentos Realizados</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1006">Relatórios<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/relatorio" >Relatório de Utilização Vtr por Data</a></li>
                        <li><a href="{$HOST}/relatoriocombustivel" >Relatório de Abastecimentos</a></li>
                        <li><a href="{$HOST}/relatoriovtr" >Relatório de Utilização de Vtr</a></li>
                        <li><a href="{$HOST}/relatoriomotorista" >Relatório de Utilização de Motorista</a></li>
                        <li><a href="{$HOST}/viaturasindisponiveis" >Gráfico Disponibilidade/Indisponibilidade Vtr</a></li>
                    </ul>
                </li>
                <li><a href="{$HOST}/alterarusuario" tabindex="1007">Olá {$login}</a></li>
                <li><a href="{$HOST}/logout" tabindex="1008">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	