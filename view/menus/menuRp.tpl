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
            <a class="navbar-brand tabela" href="/militar">Controle</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1002">Militares<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/militar">Cadastrar Militar</a></li>
                        <li><a href="/militarescadastrados">Militares Cadastrados</a></li>
                        <li><a href="/militaresinativos">Militares Inativos</a></li>
                        <li><a href="/motoristascadastrados">Motoristas Cadastrados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="1006">Relatórios<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/relatorio" >Relatório de Utilização Vtr por Data</a></li>
                    </ul>
                </li>
                <li><a href="/alterarusuario" tabindex="1007">Olá {$login}</a></li>
                <li><a href="/logout" tabindex="1008">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	