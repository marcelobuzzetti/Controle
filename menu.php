<?php
$endereco = '/controle1';

include 'verificarLogin.php';
switch ($_SESSION['perfil']) {
    case 1:
        ?>
        <ul id="nav" class="nav nav-pills">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Controle<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="../percursos/index.php">Cadastrar Saída de Viatura</a></li>
                    <li><a href="../motoristas/index.php">Cadastrar Motorista</a></li>
                    <li><a href="../marcas/index.php">Cadastrar Marca</a></li>
                    <li><a href="../modelos/index.php">Cadastrar Modelo</a></li>
                    <li><a href="../viaturas/index.php">Cadastrar Viatura</a></li>
                    <li><a href="../combustiveis/index.php">Cadastrar Combustível</a></li>
                    <li><a href="../tipos_combustiveis/index.php">Cadastrar Tipo de Combustível</a></li>
                    <li><a href="../recibos_combustiveis/index.php">Cadastrar Recebimento de Combustível</a></li>
                    <li><a href="../abastecimentos/index.php">Cadastrar Abastecimento</a></li>
                    <li><a href="../usuarios/cadastrar_usuario.php">Cadastrar Usuário</a></li>
                    <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
                    <li><a href="../tabelas/index.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá <?php echo $_SESSION['login']; ?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>


        <?php
        break;
    case 2:
        ?>        
        <ul id="nav" class="nav nav-pills">
            <li><a href="../percursos/index.php">Cadastrar Saída de Viatura</a></li>
            <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
            <li><a>Olá <?php echo $_SESSION['login']; ?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>  
        <?php
        break;
    case 3:
        ?>
        <ul id="nav" class="nav nav-pills">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Cadastros <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="../motoristas/index.php">Cadastrar Motorista</a></li>
                    <li><a href="../marcas/index.php">Cadastrar Marca</a></li>
                    <li><a href="../modelos/index.php">Cadastrar Modelo</a></li>
                    <li><a href="../viaturas/index.php">Cadastrar Viatura</a></li>
                    <li><a href="../tabelas/index.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá <?php echo $_SESSION['login']; ?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>
        <?php
        break;
    case 4:
        ?>
        <ul id="nav" class="nav nav-pills">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Cadastros <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="../motoristas/index.php">Cadastrar Motorista</a></li>
                    <li><a href="../marcas/index.php">Cadastrar Marca</a></li>
                    <li><a href="../modelos/index.php">Cadastrar Modelo</a></li>
                    <li><a href="../viaturas/index.php">Cadastrar Viatura</a></li>
                    <li><a href="../combustiveis/index.php">Cadastrar Combustível</a></li>
                    <li><a href="../tipos_combustiveis/index.php">Cadastrar Tipo de Combustível</a></li>
                    <li><a href="../recibos_combustiveis/index.php">Cadastrar Recebimento de Combustível</a></li>
                    <li><a href="../abastecimentos/index.php">Cadastrar Abastecimento</a></li>
                    <li><a href="../tabelas/index.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá <?php echo $_SESSION['login']; ?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>
        <?php
        break;
    default:
}
?>