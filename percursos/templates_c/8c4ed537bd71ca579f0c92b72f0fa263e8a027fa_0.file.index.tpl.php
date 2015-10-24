<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-24 16:12:10
         compiled from "/var/www/html/controle/templates/percursos/index.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_562bc9fa2d3493_36521681',
  'file_dependency' => 
  array (
    '8c4ed537bd71ca579f0c92b72f0fa263e8a027fa' => 
    array (
      0 => '/var/www/html/controle/templates/percursos/index.tpl',
      1 => 1445710155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_562bc9fa2d3493_36521681')) {
function content_562bc9fa2d3493_36521681 ($_smarty_tpl) {
?>
  <fieldset>
            <legend>Controle de Saída de Viatura</legend>
            <table class="table" text-align='center' style='width: 100%'>
                <tr>
                    <td>Viatura - Placa</td>
                    <td>Motorista</td>
                    <td>Destino</td>
                    <td>Odômetro Saída</td>
                    <td>Acompanhante</td>
                    <td></td>
                </tr>
                <tr>
                <form autocomplete="off" action="../../configs/executar.php" method="post">
                    <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                <option value='' disabled selected>Selecione a Viatura</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_viaturas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_viatura_0_saved_item = isset($_smarty_tpl->tpl_vars['viatura']) ? $_smarty_tpl->tpl_vars['viatura'] : false;
$_smarty_tpl->tpl_vars['viatura'] = new Smarty_Variable();
$__foreach_viatura_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_viatura_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['viatura']->value) {
$__foreach_viatura_0_saved_local_item = $_smarty_tpl->tpl_vars['viatura'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['viatura']->value['id_viatura'];?>
><?php echo $_smarty_tpl->tpl_vars['viatura']->value['marca'];?>
 - <?php echo $_smarty_tpl->tpl_vars['viatura']->value['modelo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['viatura']->value['placa'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['viatura'] = $__foreach_viatura_0_saved_local_item;
}
}
if ($__foreach_viatura_0_saved_item) {
$_smarty_tpl->tpl_vars['viatura'] = $__foreach_viatura_0_saved_item;
}
?>
                            </select></label></td>
                    <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                                <option value='' disabled selected>Selecione o Motorista</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['relacao_motoristas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_motorista_1_saved_item = isset($_smarty_tpl->tpl_vars['motorista']) ? $_smarty_tpl->tpl_vars['motorista'] : false;
$_smarty_tpl->tpl_vars['motorista'] = new Smarty_Variable();
$__foreach_motorista_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_motorista_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['motorista']->value) {
$__foreach_motorista_1_saved_local_item = $_smarty_tpl->tpl_vars['motorista'];
?>
                                    <option value=<?php echo $_smarty_tpl->tpl_vars['motorista']->value['id_motorista'];?>
><?php echo $_smarty_tpl->tpl_vars['motorista']->value['apelido'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['motorista'] = $__foreach_motorista_1_saved_local_item;
}
}
if ($__foreach_motorista_1_saved_item) {
$_smarty_tpl->tpl_vars['motorista'] = $__foreach_motorista_1_saved_item;
}
?>   
                            </select></label></td>
                            <td><label for="destino"><input class="form-control" type="text" style='width: 150px' id="destino" name="destino" placeholder="Destino" required="required"/></label><br /></td>
                    <td><label for="odo_saida"><input class="form-control" type="number" style='width: 150px' id="odo_saida" name="odo_saida" placeholder="Odometro Saida" required="required" step="0.1"/></label></td>
                    <td><label for="acompanhante"><input class="form-control" type="text" style='width: 150px' id="acompanhante" name="acompanhante" placeholder="Acompanhante" required="required"/></label></td>
                    <td><label><button type="submit" class="btn btn-primary" id="enviar" value="Cadastrar" name="enviar">Cadastrar</button></label></td>
                    </tr>
            </table>
        </form>
    </fieldset>
    <table class='table'>
        <caption>Viaturas Rodando</caption>
        <tr>
            <td>Ordem</td>
            <td>Viatura</td>
            <td>Motorista</td>
            <td>Destino</td>
            <td>Odômetro Saída</td>
            <td>Ch Vtr</td>
            <td>Data Saída</td>
            <td>Hora Saída</td>
            <td>Odômetro Chegada</td>
            <td></td>
            <td></td> 
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['tabela_relacao_vtr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_relacao_vtr_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr'] : false;
$__foreach_relacao_vtr_2_saved_item = isset($_smarty_tpl->tpl_vars['vtr']) ? $_smarty_tpl->tpl_vars['vtr'] : false;
$_smarty_tpl->tpl_vars['vtr'] = new Smarty_Variable();
$__foreach_relacao_vtr_2_total = $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr'] = new Smarty_Variable(array('iteration' => 0));
if ($__foreach_relacao_vtr_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['vtr']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr']->value['iteration']++;
$__foreach_relacao_vtr_2_saved_local_item = $_smarty_tpl->tpl_vars['vtr'];
?>
            <tr><form action='../../configs/executar.php' method='post' id="<?php echo $_smarty_tpl->tpl_vars['contador']->value;?>
">
                <input type='hidden' style='width: 40px;text-align: right;border: 0px' readonly='readonly' name='id' id="<?php echo $_smarty_tpl->tpl_vars['contador']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['vtr']->value['id_percurso'];?>
"/>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr']->value['iteration'] : null);?>
</td>
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
                <td><input class='form-control' type='number' placeholder='Odomêtro' name='odo_retorno'  id='odo_retorno' required='required' min="<?php echo $_smarty_tpl->tpl_vars['vtr']->value['odo_saida'];?>
" style='width: 120px;'/></td>
                <td><input class='btn btn-success' type='submit' id='retornou' name='enviar' value='Retornou'/></form></td>
        <form action='../../configs/executar.php' method='post'>
            <input type='hidden' id="<?php echo $_smarty_tpl->tpl_vars['vtr']->value['id_percurso'];?>
"value="<?php echo $_smarty_tpl->tpl_vars['vtr']->value['id_percurso'];?>
" name='id'/>
            <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar' onclick='preenche(<?php echo $_smarty_tpl->tpl_vars['contador']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['vtr']->value['id_percurso'];?>
)'/></form></td>";
</tr></form>
</tr>
<?php
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_relacao_vtr_2_saved_local_item;
}
}
if ($__foreach_relacao_vtr_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_relacao_vtr'] = $__foreach_relacao_vtr_2_saved;
}
if ($__foreach_relacao_vtr_2_saved_item) {
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_relacao_vtr_2_saved_item;
}
?>    
</table>  
<table class='table'>
    <caption>Viaturas Fechadas</caption>
    <tr>
        <td>Viatura</td>
        <td>Motorista</td>
        <td>Destino</td>
        <td>Odômetro Saída</td>
        <td>Ch Vtr</td>
        <td>Data Saída</td>
        <td>Hora Saída</td>
        <td>Odômetro Retorno</td>
        <td>Data Chegada</td>
        <td>Hora Chegada</td>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['tabela_relacao_vtr_fechadas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vtr_3_saved_item = isset($_smarty_tpl->tpl_vars['vtr']) ? $_smarty_tpl->tpl_vars['vtr'] : false;
$_smarty_tpl->tpl_vars['vtr'] = new Smarty_Variable();
$__foreach_vtr_3_total = $_smarty_tpl->_count($_from);
if ($__foreach_vtr_3_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['vtr']->value) {
$__foreach_vtr_3_saved_local_item = $_smarty_tpl->tpl_vars['vtr'];
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
            <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['odo_retorno'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['data_retorno'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['vtr']->value['hora_retorno'];?>
</td>
        </tr>
    <?php
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_vtr_3_saved_local_item;
}
}
if ($__foreach_vtr_3_saved_item) {
$_smarty_tpl->tpl_vars['vtr'] = $__foreach_vtr_3_saved_item;
}
?>    
</table>  
</BODY>
</HTML><?php }
}
