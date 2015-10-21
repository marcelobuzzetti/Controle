<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-20 20:41:14
         compiled from "/var/www/html/controle/templates/percursos/menu.php" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5626c30a6ff0b1_27894128',
  'file_dependency' => 
  array (
    'fcab9b1f1453ff7ae1a64a6f733d25673719e58c' => 
    array (
      0 => '/var/www/html/controle/templates/percursos/menu.php',
      1 => 1445380867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5626c30a6ff0b1_27894128')) {
function content_5626c30a6ff0b1_27894128 ($_smarty_tpl) {
echo '<?php
';?>include 'verificarLogin.php';
switch ($_SESSION['perfil']) {
    case 1:
        <?php echo '?>';?>
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
                    <li><a href="../usuarios/index.php">Cadastrar Usuário</a></li>
                    <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
                    <li><a href="../tabelas/index.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá <?php echo '<?php ';?>echo $_SESSION['login']; <?php echo '?>';?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>


        <?php echo '<?php
        ';?>break;
    case 2:
        <?php echo '?>';?>        
        <ul id="nav" class="nav nav-pills">
            <li><a href="../percursos/index.php">Cadastrar Saída de Viatura</a></li>
            <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
            <li><a>Olá <?php echo '<?php ';?>echo $_SESSION['login']; <?php echo '?>';?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>  
        <?php echo '<?php
        ';?>break;
    case 3:
        <?php echo '?>';?>
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
            <li><a>Olá <?php echo '<?php ';?>echo $_SESSION['login']; <?php echo '?>';?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>
        <?php echo '<?php
        ';?>break;
    case 4:
        <?php echo '?>';?>
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
            <li><a>Olá <?php echo '<?php ';?>echo $_SESSION['login']; <?php echo '?>';?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>
        <?php echo '<?php
        ';?>break;
    default:
}
<?php echo '?>';
}
}
