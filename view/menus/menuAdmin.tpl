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
                <li><a href="{$HOST}/percurso" tabindex="1000">Viatura Saindo?</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1001">Viaturas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/viaturascadastradas">Viaturas Cadastradas</a></li>
                        <li><a href="{$HOST}/alteracaovtr">Cadastrar Alteração de Viatura</a></li>
                        <li><a href="{$HOST}/manutencaovtr">Cadastrar Manutenção de Viatura</a></li>
                        <li><a href="{$HOST}/acidentevtr">Cadastrar Acidente de Viatura</a></li>
                        <li><a href="{$HOST}/marca">Cadastrar Marca</a></li>
                        <li><a href="{$HOST}/modelo">Cadastrar Modelo</a></li>
                        <li><a href="{$HOST}/viatura">Cadastrar Viatura</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1002">Militares<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/militar">Cadastrar Militar</a></li>
                        <li><a href="{$HOST}/militarescadastrados">Militares Cadastrados</a></li>
                        <li><a href="{$HOST}/militaresinativos">Militares Inativos</a></li>
                        <li><a href="{$HOST}/motorista">Cadastrar Motorista</a></li>
                        <li><a href="{$HOST}/motoristascadastrados">Motoristas Cadastrados</a></li>
                        <li><a href="{$HOST}/motoristasinativos">Motoristas Inativos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1003">Combustíveis <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/combustiveldisponivel">Combustível Disponível</a></li>
                        <li><a href="{$HOST}/combustiveiscadastrados">Combustíveis Cadastrados</a></li>
                        <li><a href="{$HOST}/combustivel">Cadastrar Combustível</a></li>
                        <li><a href="{$HOST}/tiposcombustiveiscadastrados">Tipos de Combustíveis Cadastrados</a></li>
                        <li><a href="{$HOST}/tipocombustivel">Cadastrar Tipo de Combustível</a></li>
                        <li><a href="{$HOST}/recebimentocombustivelcadastrado">Recebimento de Combustível Cadastrado</a></li>
                        <li><a href="{$HOST}/recebimentocombustivel">Cadastrar Recebimento de Combustível</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1004">Abastecimento<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/abastecimentorealizado">Abastecimentos Realizados</a></li>
                        <li><a href="{$HOST}/abastecimento">Abastecer?</a></li>
                    </ul>
                </li>                

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1005">Usuários <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/usuarioscadastrados">Usuários Cadastrados</a></li>
                        <li><a href="{$HOST}/usuario">Cadastrar Usuário?</a></li>
                        <li><a href="{$HOST}/usuariosinativos">Usuários Inativos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1006">Relatórios<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/relatorio" >Relatório de Utilização Vtr por Data</a></li>
                        <li><a href="{$HOST}/relatoriocombustivel" >Relatório de Abastecimentos</a></li>
                        <li><a href="{$HOST}/relatoriovtr" >Relatório de Utilização de Vtr</a></li>
                        <li><a href="{$HOST}/relatoriomotorista" >Relatório de Utilização de Motorista</a></li>
                    </ul>
                </li>
                <li><a href="{$HOST}/alterarusuario" tabindex="1007">Olá {$login}</a></li>
                <li><a href="{$HOST}/logout" tabindex="1008">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	