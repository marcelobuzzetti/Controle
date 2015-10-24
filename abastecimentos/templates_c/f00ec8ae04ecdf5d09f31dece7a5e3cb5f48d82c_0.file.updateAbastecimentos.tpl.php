<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-21 16:03:44
         compiled from "/var/www/html/controle/templates/abastecimentos/updateAbastecimentos.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5627d381116255_77116650',
  'file_dependency' => 
  array (
    'f00ec8ae04ecdf5d09f31dece7a5e3cb5f48d82c' => 
    array (
      0 => '/var/www/html/controle/templates/abastecimentos/updateAbastecimentos.tpl',
      1 => 1445450526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5627d381116255_77116650')) {
function content_5627d381116255_77116650 ($_smarty_tpl) {
?>
        <fieldset>
            <legend>Abastecimentos</legend>
            <table class="table" text-align='center' style='width: 100%'>
                <tr>
                    <td>Número Vale</td>
                    <td>Motorista</td>
                    <td>Viatura</td>
                    <td>Combustível</td>
                    <td>Tipo</td>
                    <td>Quantidade</td>
                    <td></td>
                </tr>
                <tr>
                <form action="../executar.php" method="post">
                    <td><label for="nrvale"><input class="form-control" type="text" style='width: 150px' id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" value="<?php echo $_smarty_tpl->tpl_vars['dados_abastecimentos']->value['nrvale'];?>
"/></label></td>
                    <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                            <option value='' disabled selected>Selecione o Motorista</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_motoristas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_motorista_0_saved_item = isset($_smarty_tpl->tpl_vars['motorista']) ? $_smarty_tpl->tpl_vars['motorista'] : false;
$_smarty_tpl->tpl_vars['motorista'] = new Smarty_Variable();
$__foreach_motorista_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_motorista_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['motorista']->value) {
$__foreach_motorista_0_saved_local_item = $_smarty_tpl->tpl_vars['motorista'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['motorista']->value['id_motorista'];?>
><?php echo $_smarty_tpl->tpl_vars['motorista']->value['apelido'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['motorista'] = $__foreach_motorista_0_saved_local_item;
}
}
if ($__foreach_motorista_0_saved_item) {
$_smarty_tpl->tpl_vars['motorista'] = $__foreach_motorista_0_saved_item;
}
?>
                            </select></label></td>
                    <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                 <option value='' disabled selected>Selecione a Viatura</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_viaturas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_viaturas_1_saved_item = isset($_smarty_tpl->tpl_vars['viaturas']) ? $_smarty_tpl->tpl_vars['viaturas'] : false;
$_smarty_tpl->tpl_vars['viaturas'] = new Smarty_Variable();
$__foreach_viaturas_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_viaturas_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['viaturas']->value) {
$__foreach_viaturas_1_saved_local_item = $_smarty_tpl->tpl_vars['viaturas'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['viaturas']->value['id_viatura'];?>
><?php echo $_smarty_tpl->tpl_vars['viaturas']->value['marca'];?>
 - <?php echo $_smarty_tpl->tpl_vars['viaturas']->value['modelo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['viaturas']->value['placa'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['viaturas'] = $__foreach_viaturas_1_saved_local_item;
}
}
if ($__foreach_viaturas_1_saved_item) {
$_smarty_tpl->tpl_vars['viaturas'] = $__foreach_viaturas_1_saved_item;
}
?>
                            </select></label></td>
                    <td><label for="combustivel"><select class="form-control" name="combustivel">
                                <option value='' disabled selected>Selecione o Combustível</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_combustiveis_2_saved_item = isset($_smarty_tpl->tpl_vars['combustiveis']) ? $_smarty_tpl->tpl_vars['combustiveis'] : false;
$_smarty_tpl->tpl_vars['combustiveis'] = new Smarty_Variable();
$__foreach_combustiveis_2_total = $_smarty_tpl->_count($_from);
if ($__foreach_combustiveis_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['combustiveis']->value) {
$__foreach_combustiveis_2_saved_local_item = $_smarty_tpl->tpl_vars['combustiveis'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['combustiveis']->value['id_combustivel'];?>
><?php echo $_smarty_tpl->tpl_vars['combustiveis']->value['descricao'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['combustiveis'] = $__foreach_combustiveis_2_saved_local_item;
}
}
if ($__foreach_combustiveis_2_saved_item) {
$_smarty_tpl->tpl_vars['combustiveis'] = $__foreach_combustiveis_2_saved_item;
}
?>
                            </select></label></td>
                    <td><label for="tp"><select class="form-control" name="tp">
                                <option value='' disabled selected>Selecione o Tipo  de Combustível</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_tipos_combustiveis']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tipos_combustiveis_3_saved_item = isset($_smarty_tpl->tpl_vars['tipos_combustiveis']) ? $_smarty_tpl->tpl_vars['tipos_combustiveis'] : false;
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = new Smarty_Variable();
$__foreach_tipos_combustiveis_3_total = $_smarty_tpl->_count($_from);
if ($__foreach_tipos_combustiveis_3_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tipos_combustiveis']->value) {
$__foreach_tipos_combustiveis_3_saved_local_item = $_smarty_tpl->tpl_vars['tipos_combustiveis'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['tipos_combustiveis']->value['id_tipo_combustivel'];?>
><?php echo $_smarty_tpl->tpl_vars['tipos_combustiveis']->value['descricao'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = $__foreach_tipos_combustiveis_3_saved_local_item;
}
}
if ($__foreach_tipos_combustiveis_3_saved_item) {
$_smarty_tpl->tpl_vars['tipos_combustiveis'] = $__foreach_tipos_combustiveis_3_saved_item;
}
?>
                            </select></label></td>
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['dados_abastecimentos']->value['id_abastecimento'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['dados_abastecimentos']->value['id_abastecimento'];?>
' name='id'/>
                    <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="<?php echo $_smarty_tpl->tpl_vars['dados_abastecimentos']->value['qnt'];?>
"/></label></td>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="abst" name="enviar">Cadastrar</button></label></td>
                    </tr>
            </table>
        </form>
        <table border=2px style='width:100%'>
            <caption>Abastecimentos</caption>
               <tr>
                   <td>Ordem</td>
                   <td>Nº Vale</td>
                   <td>Motorista</td>
                   <td>Viatura</td>
                   <td>Combustível</td>
                   <td>Tipo</td>
                   <td>Quantidade</td>
                   <td>Data</td>
                   <td>Hora</td>
                   <td></td>
                   <td></td>
               </tr>
            <?php
$_from = $_smarty_tpl->tpl_vars['tabela_relacao_abastecimentos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tbl_4_saved_item = isset($_smarty_tpl->tpl_vars['tbl']) ? $_smarty_tpl->tpl_vars['tbl'] : false;
$_smarty_tpl->tpl_vars['tbl'] = new Smarty_Variable();
$__foreach_tbl_4_total = $_smarty_tpl->_count($_from);
if ($__foreach_tbl_4_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tbl']->value) {
$__foreach_tbl_4_saved_local_item = $_smarty_tpl->tpl_vars['tbl'];
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['contador']->value;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['nrvale'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['apelido'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['marca'];?>
 - <?php echo $_smarty_tpl->tpl_vars['tbl']->value['placa'];?>
 - <?php echo $_smarty_tpl->tpl_vars['tbl']->value['modelos'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['combustivel'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['tipo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['qnt'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['data'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['hora'];?>
</td>
                <form action='../../configs/executar.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_abastecimento'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_abastecimento'];?>
' name='id'/>
                                    <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_abst'/>Apagar Abastecimento</form></td>
                </form>
            <form action='update_abastecimento.php' method='post'>
                                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_abastecimento'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_abastecimento'];?>
' name='id'/>
                                    <td><button class='btn btn-success' type='submit' id='apagar' name='enviar' value='atualiza_abst'/>Atualizar Abastecimento</form></td>
            </form></tr>
            <?php echo $_smarty_tpl->tpl_vars['contador']->value++;?>

            <?php
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_tbl_4_saved_local_item;
}
}
if ($__foreach_tbl_4_saved_item) {
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_tbl_4_saved_item;
}
?>    
        </table>  
    </fieldset>
</BODY>
</HTML><?php }
}
