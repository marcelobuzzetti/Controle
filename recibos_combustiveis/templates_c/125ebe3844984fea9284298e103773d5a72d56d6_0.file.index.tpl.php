<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-27 14:29:26
         compiled from "/var/www/html/controle/templates/recibos_combustiveis/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562fa666613057_59229014',
  'file_dependency' => 
  array (
    '125ebe3844984fea9284298e103773d5a72d56d6' => 
    array (
      0 => '/var/www/html/controle/templates/recibos_combustiveis/index.tpl',
      1 => 1445963364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562fa666613057_59229014')) {
function content_562fa666613057_59229014 ($_smarty_tpl) {
?>
<fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Combustível</td>
                        <td><label for="combustivel"><select class="form-control" name="combustivel">
                                <option value='' disabled selected>Selecione o Combustível</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_combustiveis_0_saved_item = isset($_smarty_tpl->tpl_vars['combustiveis']) ? $_smarty_tpl->tpl_vars['combustiveis'] : false;
$_smarty_tpl->tpl_vars['combustiveis'] = new Smarty_Variable();
$__foreach_combustiveis_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_combustiveis_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['combustiveis']->value) {
$__foreach_combustiveis_0_saved_local_item = $_smarty_tpl->tpl_vars['combustiveis'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['combustiveis']->value['id_combustivel'];?>
><?php echo $_smarty_tpl->tpl_vars['combustiveis']->value['descricao'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['combustiveis'] = $__foreach_combustiveis_0_saved_local_item;
}
}
if ($__foreach_combustiveis_0_saved_item) {
$_smarty_tpl->tpl_vars['combustiveis'] = $__foreach_combustiveis_0_saved_item;
}
?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td><label for="tipo"><select class="form-control" name="tp">
                                 <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_tipo_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tipos_combustiveis_1_saved_item = isset($_smarty_tpl->tpl_vars['tipos_combustiveis']) ? $_smarty_tpl->tpl_vars['tipos_combustiveis'] : false;
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = new Smarty_Variable();
$__foreach_tipos_combustiveis_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_tipos_combustiveis_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipos_combustiveis']->value) {
$__foreach_tipos_combustiveis_1_saved_local_item = $_smarty_tpl->tpl_vars['tipos_combustiveis'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['tipos_combustiveis']->value['id_tipo_combustivel'];?>
><?php echo $_smarty_tpl->tpl_vars['tipos_combustiveis']->value['descricao'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = $__foreach_tipos_combustiveis_1_saved_local_item;
}
}
if ($__foreach_tipos_combustiveis_1_saved_item) {
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = $__foreach_tipos_combustiveis_1_saved_item;
}
?>
                            </select></label></td>
                    </tr>
                    <tr>
                        <td>Quantidade</td>
                        <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="<?php echo $_smarty_tpl->tpl_vars['qnt']->value;?>
"/></label><br /></td>
                    </tr>
                    <tr>
                        <td>Motivo</td>
                        <td><label for="motivo"><input class="form-control" type="text" style='width: 150px' id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" value="<?php echo $_smarty_tpl->tpl_vars['motivo']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td></td>
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['id_rcb_comb']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['id_rcb_comb']->value;?>
' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value;?>
" name="enviar"><?php echo $_smarty_tpl->tpl_vars['botao']->value;?>
</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Combustível Recebido</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Combustível</td>
                        <td>Tipo</td>
                        <td>Quantidade</td>
                        <td>Motivo</td>
                        <td>Data</td>
                        <td>Hora</td>
                        <td></td>
                        <td></td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['relacao_rcb_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_rcb_combustiveis_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis'] : false;
$__foreach_relacao_rcb_combustiveis_2_saved_item = isset($_smarty_tpl->tpl_vars['tbl']) ? $_smarty_tpl->tpl_vars['tbl'] : false;
$_smarty_tpl->tpl_vars['tbl'] = new Smarty_Variable();
$__foreach_relacao_rcb_combustiveis_2_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_rcb_combustiveis_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tbl']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis']->value['iteration']++;
$__foreach_relacao_rcb_combustiveis_2_saved_local_item = $_smarty_tpl->tpl_vars['tbl'];
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['combustivel'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['tipo'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['qnt'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['motivo'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['data'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['hora'];?>
</td>
                                <form action='../configs/executar.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_recibo_combustivel'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_recibo_combustivel'];?>
' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_rcb_comb'/>Apagar Recebimento de Combustível</form></td>
                                </form>
                                <form action='index.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_recibo_combustivel'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_recibo_combustivel'];?>
' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_viatura'/>Atualizar Recebimento de Combustível</form></td>
                                </form>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_rcb_combustiveis_2_saved_local_item;
}
}
if ($__foreach_relacao_rcb_combustiveis_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_rcb_combustiveis'] = $__foreach_relacao_rcb_combustiveis_2_saved;
}
if ($__foreach_relacao_rcb_combustiveis_2_saved_item) {
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_rcb_combustiveis_2_saved_item;
}
?>
            </table>
        </fieldset>
    </body>
</html><?php }
}
