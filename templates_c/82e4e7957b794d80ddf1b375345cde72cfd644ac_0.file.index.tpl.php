<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-24 16:11:30
         compiled from "/var/www/html/controle/templates/home/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562bc9d2620f45_19738278',
  'file_dependency' => 
  array (
    '82e4e7957b794d80ddf1b375345cde72cfd644ac' => 
    array (
      0 => '/var/www/html/controle/templates/home/index.tpl',
      1 => 1445710278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562bc9d2620f45_19738278')) {
function content_562bc9d2620f45_19738278 ($_smarty_tpl) {
?>
<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <?php echo '<script'; ?>
 src="./libs/js/jquery.js"><?php echo '</script'; ?>
>
        <link href="./libs/css/bootstrap.css" rel="stylesheet">
        <?php echo '<script'; ?>
 src="./libs/js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./libs/js/script.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./libs/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./libs/js/jquery-ui.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./libs/js/script.js"><?php echo '</script'; ?>
>
    </HEAD>
    <body>
        <form class="form-inline" action="./configs/executar.php" method="post">
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
                    <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['marca'];?>
 - <?php echo $_smarty_tpl->tpl_vars['vtr']->value['modelo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['vtr']->value['placa'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['apelido'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['nome_destino'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['odo_saida'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['acompanhante'];?>
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
