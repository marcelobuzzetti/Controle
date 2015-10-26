<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-26 16:23:39
         compiled from "/var/www/html/controle/templates/marcas/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562e6fabe3b6a3_70856365',
  'file_dependency' => 
  array (
    'e8d4d9052698f8a9b678bb7102fe9f4d4de17580' => 
    array (
      0 => '/var/www/html/controle/templates/marcas/index.tpl',
      1 => 1445883815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562e6fabe3b6a3_70856365')) {
function content_562e6fabe3b6a3_70856365 ($_smarty_tpl) {
?>
 <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Marcas</td>
                        <td><label for="marca"><input autofocus class="form-control" type="text" style='width: 150px' id="marca" name="marca" placeholder="Marca" required="required" value="<?php echo $_smarty_tpl->tpl_vars['descricao']->value;?>
"/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['id_marca']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['id_marca']->value;?>
' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_marca" name="enviar"><?php echo $_smarty_tpl->tpl_vars['botao']->value;?>
</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Marcas Cadastradas</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Marca</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['relacao_marcas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_marcas_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas'] : false;
$__foreach_relacao_marcas_0_saved_item = isset($_smarty_tpl->tpl_vars['marca']) ? $_smarty_tpl->tpl_vars['marca'] : false;
$_smarty_tpl->tpl_vars['marca'] = new Smarty_Variable();
$__foreach_relacao_marcas_0_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_marcas_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas']->value['iteration']++;
$__foreach_relacao_marcas_0_saved_local_item = $_smarty_tpl->tpl_vars['marca'];
?>
                    <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['marca']->value['descricao'];?>
</td>
                        <form action='../configs/executar.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_marca'/>Apagar Marca</form></td>
                        </form>
                        <form action='index.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_marca'/>Atualizar Marca</form></td>
                        </form>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['marca'] = $__foreach_relacao_marcas_0_saved_local_item;
}
}
if ($__foreach_relacao_marcas_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_marcas'] = $__foreach_relacao_marcas_0_saved;
}
if ($__foreach_relacao_marcas_0_saved_item) {
$_smarty_tpl->tpl_vars['marca'] = $__foreach_relacao_marcas_0_saved_item;
}
?>
            </table>
        </fieldset>
    </body>
</html><?php }
}
