<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-21 14:04:33
         compiled from "/var/www/html/controle/templates/menus/menuOperador.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5627b79135d658_42227947',
  'file_dependency' => 
  array (
    'ad07ca30d449135e1228939bf9b6f15e0da6bfec' => 
    array (
      0 => '/var/www/html/controle/templates/menus/menuOperador.tpl',
      1 => 1445443008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5627b79135d658_42227947')) {
function content_5627b79135d658_42227947 ($_smarty_tpl) {
?>
 <ul id="nav" class="nav nav-pills">
            <li><a href="../percursos/index.php">Cadastrar Saída de Viatura</a></li>
            <li><a href="../tabelas/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
            <li><a>Olá <?php echo '<?php ';?>echo $_SESSION['login']; <?php echo '?>';?></a></li>
            <li><a href="../usuarios/logout.php">Logout</a></li>
        </ul>  <?php }
}
