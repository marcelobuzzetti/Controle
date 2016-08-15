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
                <li><a href="{$HOST}/relatorio" >Relatório de Utilização Vtr por Data</a></li>
                <li><a href="{$HOST}/alterarusuario" tabindex="1007">Olá {$login}</a></li>
                <li><a href="{$HOST}/logout" tabindex="1008">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>	
