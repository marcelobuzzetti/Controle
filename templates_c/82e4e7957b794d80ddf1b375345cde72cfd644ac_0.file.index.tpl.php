<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-19 21:49:05
         compiled from "/var/www/html/controle/templates/home/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562581716425e7_78210391',
  'file_dependency' => 
  array (
    '82e4e7957b794d80ddf1b375345cde72cfd644ac' => 
    array (
      0 => '/var/www/html/controle/templates/home/index.tpl',
      1 => 1445297721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562581716425e7_78210391')) {
function content_562581716425e7_78210391 ($_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
        <link href="css/bootstrap.css" rel="stylesheet">
        <?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="js/script.js"><?php echo '</script'; ?>
>
        <title>Sistema</title>
    </head>
    <body> 
        <form class="form-inline" action="executar.php" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input autofocus type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
            </div>
            <button type="submit" value="login" name="enviar" class="btn btn-default">Login</button>
        </form>  
          <table class='table'>
                 <caption>Viaturas Rodando</caption>
                    <tr>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Ch Vtr</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>
               <?php
$_from = $_smarty_tpl->tpl_vars['tabela_relacao_vtr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vtr_0_saved_item = isset($_smarty_tpl->tpl_vars['vtr']) ? $_smarty_tpl->tpl_vars['vtr'] : false;
$_smarty_tpl->tpl_vars['vtr'] = new Smarty_Variable();
$__foreach_vtr_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_vtr_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['vtr']->value) {
$__foreach_vtr_0_saved_local_item = $_smarty_tpl->tpl_vars['vtr'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['viatura'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['apelido'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['destino'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['odo_saida'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['ch_vtr'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['data_saida'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['hora_saida'];?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_vtr_0_saved_local_item;
}
}
if ($__foreach_vtr_0_saved_item) {
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_vtr_0_saved_item;
}
?>    
         </table>  
    </body>
</html><?php }
}
