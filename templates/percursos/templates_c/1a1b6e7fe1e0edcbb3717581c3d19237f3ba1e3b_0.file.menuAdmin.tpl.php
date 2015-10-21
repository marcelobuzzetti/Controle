<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-21 14:10:47
         compiled from "/var/www/html/controle/templates/menus/menuAdmin.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5627b907208085_00082351',
  'file_dependency' => 
  array (
    '1a1b6e7fe1e0edcbb3717581c3d19237f3ba1e3b' => 
    array (
      0 => '/var/www/html/controle/templates/menus/menuAdmin.tpl',
      1 => 1445443795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5627b907208085_00082351')) {
function content_5627b907208085_00082351 ($_smarty_tpl) {
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
                    <li><a href="../usuarios/index.php">Cadastrar Usuário</a></li>
                    <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
                    <li><a href="../tabelas/index.php" >Relatório por Data</a></li>
                </ul>
            </li>
            <li><a>Olá <?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</a></li>
            <li><a href="../../usuarios/logout.php">Logout</a></li>
        </ul>
<?php }
}
