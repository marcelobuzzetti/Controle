        <fieldset>
            <legend>Cadastro de Modelos</legend>
            <table border=2px text-align='center' style='width: 40%'>
                <form action="../configs/executar.php" method="post">
                    <tr>
                        <td>Marca</td>
                        <td><label for="marca"><select class="form-control" name="marca" required>
                                    <option value='' disabled selected>Selecione a Marca</option>
                                   {foreach $relacao_marcas as $marca}
                                    <option value={$marca.id_marca}>{$marca.descricao}</option>
                                {/foreach}
                                </select></label></td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td><label for="modelo"><input autofocus class="form-control" type="text" style='width: 150px' id="modelo" name="modelo" placeholder="Modelo" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Capacidade do Tanque</td>
                        <td><label for="cap_tanque"><input class="form-control" type="number" style='width: 150px' id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Consumo Padrão</td>
                        <td><label for="cons_padrao"><input class="form-control" type="number" style='width: 150px' id="cons_padrao" name="consumo_padrao" placeholder="Consumo Km/L" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Capacidade de Transporte</td>
                        <td><label for="cap_transp"><input class="form-control" type="number" style='width: 150px' id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required"/></label></td>
                    </tr>
                    <tr>
                        <td>Habilitação Necessária</td>
                        <td><label for="habilitacao"><select class="form-control" name="habilitacao" required>
                                    <option value='' disabled selected>Selecione a Habilitação</option>
                                   {foreach $relacao_habilitacoes as $habilitacao}
                                    <option value={$habilitacao.id_habilitacao}>{$habilitacao.categoria}</option>
                                {/foreach}
                                </select></label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><label><button type="submit" class="btn btn-primary" id="enviar" value="cadastrar_modelo" name="enviar">Cadastrar</button></label></td>
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
                        {foreach $tabela_modelos_cadastrados as $tbl name=relacao_modelos}
                        <tr>
                            <td>{$smarty.foreach.relacao_modelos.iteration}</td>
                            <td>{$tbl.marca}</td>
                            <td>{$tbl.descricao}</td>
                            <td>{$tbl.cap_tanque}</td>
                            <td>{$tbl.consumo_padrao}</td>
                            <td>{$tbl.cap_transp}</td>
                            <td>{$tbl.habilitacao}</td>
                            <form action='../configs/executar.php' method='post'>
                                        <input type='hidden' id='{$tbl.id_modelo}' value='{$tbl.id_modelo}' name='id'/>
                                        <td><button class='btn btn-danger' type='submit' id='apagar' name='enviar' value='apagar_modelo'/>Apagar Modelo</form></td>
                            </form>
                            <form action='update_modelo.php' method='post'>
                                        <input type='hidden' id='{$tbl.id_modelo}' value='{$tbl.id_modelo}' name='id'/>
                                        <td><button class='btn btn-success' type='submit' id='atualizar' name='enviar' value='atualizar_modelo'/>Atualizar Modelo</form></td>
                            </form>
                        </tr>
                        {/foreach}
            </table>
        </fieldset>
    </body>
</html>