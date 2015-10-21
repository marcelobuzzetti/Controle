<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-21 13:54:46
         compiled from "/var/www/html/controle/templates/headers/headerPercursos.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5627b546242260_11063880',
  'file_dependency' => 
  array (
    '4e99d95c625bc29df4d89c7283771bef2ad23da6' => 
    array (
      0 => '/var/www/html/controle/templates/headers/headerPercursos.tpl',
      1 => 1445442869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5627b546242260_11063880')) {
function content_5627b546242260_11063880 ($_smarty_tpl) {
?>
<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <?php echo '<script'; ?>
 src="../../lib/js/jquery.js"><?php echo '</script'; ?>
>
        <link href="../../lib/css/bootstrap.css" rel="stylesheet">
        <?php echo '<script'; ?>
 src="../../lib/js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../lib/js/script.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../lib/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../lib/js/jquery-ui.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../lib/js/script.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
>
            $(function () {
                $("#destino").autocomplete({
                    source: "../../configs/buscador.php",
                    minLength: 3
                });
            });
        <?php echo '</script'; ?>
>

    </HEAD>
    <body><?php }
}
