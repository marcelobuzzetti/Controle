<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-26 20:07:04
         compiled from "/var/www/html/controle/templates/modelos/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562ea4083a70d2_39460232',
  'file_dependency' => 
  array (
    '431cefe3a32989d080a16fc4135f3a2bd06ee326' => 
    array (
      0 => '/var/www/html/controle/templates/modelos/index.tpl',
      1 => 1445896132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562ea4083a70d2_39460232')) {
function content_562ea4083a70d2_39460232 ($_smarty_tpl) {
?>
        <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Marca</td>
                        <td><label for="marca"><select class="form-control" name="marca" required>
                                    <option value='' disabled selected>Selecione a Marca</option>
                                   <?php
$_from = $_smarty_tpl->tpl_vars['relacao_marcas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_marca_0_saved_item = isset($_smarty_tpl->tpl_vars['marca']) ? $_smarty_tpl->tpl_vars['marca'] : false;
$_smarty_tpl->tpl_vars['marca'] = new Smarty_Variable();
$__foreach_marca_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_marca_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$__foreach_marca_0_saved_local_item = $_smarty_tpl->tpl_vars['marca'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['marca']->value['id_marca'];?>
><?php echo $_smarty_tpl->tpl_vars['marca']->value['descricao'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['marca'] = $__foreach_marca_0_saved_local_item;
}
}
if ($__foreach_marca_0_saved_item) {
$_smarty_tpl->tpl_vars['marca'] = $__foreach_marca_0_saved_item;
}
?>
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td><label for="modelo"><input autofocus class="form-control" type="text" style='width: 150px' id="modelo" name="modelo" placeholder="Modelo" required="required" value="<?php echo $_smarty_tpl->tpl_vars['descricao']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td>Capacidade do Tanque</td>
                        <td><label for="cap_tanque"><input class="form-control" type="number" style='width: 150px' id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required" value="<?php echo $_smarty_tpl->tpl_vars['cap_tanque']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td>Consumo</td>
                        <td><label for="cons_padrao"><input class="form-control" type="number" style='width: 150px' id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required" value="<?php echo $_smarty_tpl->tpl_vars['consumo_padrao']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td>Capacidade de Transporte</td>
                        <td><label for="cap_transp"><input class="form-control" type="number" style='width: 150px' id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" value="<?php echo $_smarty_tpl->tpl_vars['cap_transp']->value;?>
"/></label></td>
                    </tr>
                    <tr>
                        <td>Habilitação Necessária</td>
                        <td><label for="habilitacao"><select class="form-control" name="habilitacao" required>
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
                    <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['id_modelo']->value;?>
' value='<?php echo $_smarty_tpl->tpl_vars['id_modelo']->value;?>
' name='id'/>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value;?>
" name="enviar"><?php echo $_smarty_tpl->tpl_vars['botao']->value;?>
</button></label></td>
                    </tr>
                </form>
            </table>
            <table border=2px style='width:100%'>
                 <caption>Modelos Cadastradas</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Marca</td>
                        <td>Modelo</td>
                        <td>Capacidade do Tanque</td>
                        <td>Consumo Km/L</td>
                        <td>Capacidade(Pessoas)</td>
                        <td>Habilitação Necessária</td>
                        <td></td>
                        <td></td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['tabela_modelos_cadastrados']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_modelos_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos'] : false;
$__foreach_relacao_modelos_2_saved_item = isset($_smarty_tpl->tpl_vars['tbl']) ? $_smarty_tpl->tpl_vars['tbl'] : false;
$_smarty_tpl->tpl_vars['tbl'] = new Smarty_Variable();
$__foreach_relacao_modelos_2_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_modelos_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['tbl']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos']->value['iteration']++;
$__foreach_relacao_modelos_2_saved_local_item = $_smarty_tpl->tpl_vars['tbl'];
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['marca'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['descricao'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['cap_tanque'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['consumo_padrao'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['cap_transp'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['tbl']->value['habilitacao'];?>
</td>
                            <form action='../configs/executar.php' method='post'>
                                        <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_modelo'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_modelo'];?>
' name='id'/>
                                        <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_modelo'/>Apagar Modelo</form></td>
                            </form>
                            <form action='index.php' method='post'>
                                        <input type='hidden' id='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_modelo'];?>
' value='<?php echo $_smarty_tpl->tpl_vars['tbl']->value['id_modelo'];?>
' name='id'/>
                                        <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_modelo'/>Atualizar Modelo</form></td>
                            </form>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_modelos_2_saved_local_item;
}
}
if ($__foreach_relacao_modelos_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_modelos'] = $__foreach_relacao_modelos_2_saved;
}
if ($__foreach_relacao_modelos_2_saved_item) {
$_smarty_tpl->tpl_vars['tbl'] = $__foreach_relacao_modelos_2_saved_item;
}
?>
            </table>
        </fieldset>
    </body>
</html><?php }
}
