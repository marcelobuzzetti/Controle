<ul id="nav" class="nav nav-pills">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Cadastros <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{$HOST}/controller/motorista.php">Cadastrar Motorista</a></li>
                    <li><a href="{$HOST}/controller/marca.php">Cadastrar Marca</a></li>
                    <li><a href="{$HOST}/controller/modelo.php">Cadastrar Modelo</a></li>
                    <li><a href="{$HOST}/controller/viatura.php">Cadastrar Viatura</a></li>
                    <li><a href="{$HOST}/controller/relatorio.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá {$login}</a></li>
            <li><a href="{$HOST}/model/logout.php">Logout</a></li>
        </ul>