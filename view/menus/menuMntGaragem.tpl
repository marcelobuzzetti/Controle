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
            <a class="navbar-brand" href="#">Controle</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://{$HOST}/percurso">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Viaturas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/marca">Cadastrar Marca</a></li>
                        <li><a href="{$HOST}/modelo">Cadastrar Modelo</a></li>
                        <li><a href="{$HOST}/viatura">Cadastrar Viatura</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Motoristas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/motorista">Cadastrar Motorista</a></li>
                    </ul>
                </li>
                <li><a href="{$HOST}/relatorio" >Relatório por Data</a></li>
                <li><a>Olá {$login}</a></li>
                <li><a href="{$HOST}/logout">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	


<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar navbar-fixed-top">
            <ul id="nav" class="nav nav-pills">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Cadastros <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{$HOST}/motorista">Cadastrar Motorista</a></li>
                        <li><a href="{$HOST}/marca">Cadastrar Marca</a></li>
                        <li><a href="{$HOST}/modelo">Cadastrar Modelo</a></li>
                        <li><a href="{$HOST}/viatura">Cadastrar Viatura</a></li>
                        <li><a href="{$HOST}/relatorio" >Relatório por Data</a></li>
                    </ul>
                </li>
                <li><a>Olá {$login}</a></li>
                <li><a href="{$HOST}/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
