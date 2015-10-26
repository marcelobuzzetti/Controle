<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-26 16:07:28
         compiled from "/var/www/html/controle/templates/combustiveis/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562e6be08888e3_98144829',
  'file_dependency' => 
  array (
    '730a70ae466b87612f54142c695c660d912700eb' => 
    array (
      0 => '/var/www/html/controle/templates/combustiveis/index.tpl',
      1 => 1445882820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562e6be08888e3_98144829')) {
function content_562e6be08888e3_98144829 ($_smarty_tpl) {
?>
      <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Descrição</td>
                        <td><label for="descricao"><input class="form-control" type="text" style='width: 150px' id="descricao" name="descricao" placeholder="Descrição" required="required" value='<?php echo $_smarty_tpl->tpl_vars['descricao']->value;?>
'/></label></td>
                    </tr>
                    <td></td>
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['id_combustivel']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['id_combustivel']->value;?>
' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_combustivel" name="enviar"><?php echo $_smarty_tpl->tpl_vars['botao']->value;?>
</button></label></td>
                    </tr>
                </form>
            </table>
        </fieldset>
        <table border=2px style='width:100%'>
                 <caption>Combustíveis Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['relacao_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_combustiveis_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis'] : false;
$__foreach_relacao_combustiveis_0_saved_item = isset($_smarty_tpl->tpl_vars['comb']) ? $_smarty_tpl->tpl_vars['comb'] : false;
$_smarty_tpl->tpl_vars['comb'] = new Smarty_Variable();
$__foreach_relacao_combustiveis_0_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_combustiveis_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['comb']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis']->value['iteration']++;
$__foreach_relacao_combustiveis_0_saved_local_item = $_smarty_tpl->tpl_vars['comb'];
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['comb']->value['descricao'];?>
</td>
                        <form action='../configs/executar.php' method='post'>
                            <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_combustivel'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_combustivel'];?>
' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_combustivel'/>Apagar Combustível</form></td>
                        </form>
                        <form action='index.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_combustivel'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['comb']->value['id_combustivel'];?>
' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_combustivel'/>Atualizar Combustível</form></td>
                        </form>
                        </tr>
        <?php
$_smarty_tpl->tpl_vars['comb'] = $__foreach_relacao_combustiveis_0_saved_local_item;
}
}
if ($__foreach_relacao_combustiveis_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_combustiveis'] = $__foreach_relacao_combustiveis_0_saved;
}
if ($__foreach_relacao_combustiveis_0_saved_item) {
$_smarty_tpl->tpl_vars['comb'] = $__foreach_relacao_combustiveis_0_saved_item;
}
?>
        </table>
    </body>
</html><?php }
}
