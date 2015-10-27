<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-26 19:59:21
         compiled from "/var/www/html/controle/templates/motoristas/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562ea239311df1_74703383',
  'file_dependency' => 
  array (
    '0b079b9edd5f567a5091807764e90582c831b900' => 
    array (
      0 => '/var/www/html/controle/templates/motoristas/index.tpl',
      1 => 1445896621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562ea239311df1_74703383')) {
function content_562ea239311df1_74703383 ($_smarty_tpl) {
?>
<fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</legend>
            <table border=2px text-align='center'style='width: 30%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Nome de Guerra</td>
                        <td><label for="nome"><input class="form-control" type="text" style='width: 150px' id="nome" name="nome" placeholder="Nome" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td>Posto/Grad</td>
                        <td><label for="pg"><select class="form-control" name="pg" required'>
                                    <option value='' disabled selected>Selecione o Posto/Grad</option>
                                   <?php
$_from = $_smarty_tpl->tpl_vars['relacao_posto_grad']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_pg_0_saved_item = isset($_smarty_tpl->tpl_vars['pg']) ? $_smarty_tpl->tpl_vars['pg'] : false;
$_smarty_tpl->tpl_vars['pg'] = new Smarty_Variable();
$__foreach_pg_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_pg_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value) {
$__foreach_pg_0_saved_local_item = $_smarty_tpl->tpl_vars['pg'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['pg']->value['id_posto_grad'];?>
><?php echo $_smarty_tpl->tpl_vars['pg']->value['sigla'];?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['pg'] = $__foreach_pg_0_saved_local_item;
}
}
if ($__foreach_pg_0_saved_item) {
$_smarty_tpl->tpl_vars['pg'] = $__foreach_pg_0_saved_item;
}
?>
                                    </select></label></td>
                    </tr>
                    <tr>
                        <td>Categoria</td>
                        <td><label for="categoria"><select class="form-control" name="categoria" required>
                                   <option value='' disabled selected>Selecione a Habilitação</option>
                                   <?php
$_from = $_smarty_tpl->tpl_vars['relacao_habilitacoes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_habilitacao_1_saved_item = isset($_smarty_tpl->tpl_vars['habilitacao']) ? $_smarty_tpl->tpl_vars['habilitacao'] : false;
$_smarty_tpl->tpl_vars['habilitacao'] = new Smarty_Variable();
$__foreach_habilitacao_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_habilitacao_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['habilitacao']->value) {
$__foreach_habilitacao_1_saved_local_item = $_smarty_tpl->tpl_vars['habilitacao'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['habilitacao']->value['id_habilitacao'];?>
><?php echo $_smarty_tpl->tpl_vars['habilitacao']->value['categoria'];?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['habilitacao'] = $__foreach_habilitacao_1_saved_local_item;
}
}
if ($__foreach_habilitacao_1_saved_item) {
$_smarty_tpl->tpl_vars['habilitacao'] = $__foreach_habilitacao_1_saved_item;
}
?>
                                    </select></label></td>
                    </tr>
                    <tr>
                        <td></td>
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['id_motorista']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['id_motorista']->value;?>
' name='id'/>
                   <td><label><button type="submit" class="btn btn-primary" id="enviar" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value;?>
" name="enviar"><?php echo $_smarty_tpl->tpl_vars['botao']->value;?>
</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Motoristas Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Posto/Grad</td>
                        <td>Nome de Guerra</td>
                        <td>Categoria</td>
                        <td></td>
                        <td></td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['tabela_motoristas_cadastrados']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_motoristas_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas'] : false;
$__foreach_relacao_motoristas_2_saved_item = isset($_smarty_tpl->tpl_vars['tbl']) ? $_smarty_tpl->tpl_vars['tbl'] : false;
$_smarty_tpl->tpl_vars['tbl'] = new Smarty_Variable();
$__foreach_relacao_motoristas_2_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_motoristas_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tbl']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas']->value['iteration']++;
$__foreach_relacao_motoristas_2_saved_local_item = $_smarty_tpl->tpl_vars['tbl'];
?>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas']->value['iteration'] : null);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['sigla'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['categoria'];?>
</td>
                        <form action='../configs/executar.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value[$_smarty_tpl->tpl_vars['id_motorista']->value];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_motorista'];?>
' name='id'/>
                                    <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar Motorista'/></form></td>
                        </form>
                        <form action='index.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_motorista'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_motorista'];?>
' name='id'/>
                                    <td><input class='btn btn-success' type='submit' id='apagar' name='enviar' value='Atualizar Motorista'/></form></td>
                        </form>
                    </tr> 
                    <?php
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_motoristas_2_saved_local_item;
}
}
if ($__foreach_relacao_motoristas_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_motoristas'] = $__foreach_relacao_motoristas_2_saved;
}
if ($__foreach_relacao_motoristas_2_saved_item) {
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_motoristas_2_saved_item;
}
?>
            </table>
        </fieldset>
    </body>
</html>
<?php }
}
