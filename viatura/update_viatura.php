<HTML>
   <HEAD>
      <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
      <meta charset="UTF-8"/>
      <script src="../js/jquery.js"></script>
      <link   href="../css/bootstrap.css" rel="stylesheet">
      <script src="../js/bootstrap.js"></script>
      <script src="../js/script.js"></script>
	  
   </HEAD>
   <BODY>
<?php
    include "../verificarLogin.php";
    include"../menu.php";
    include"../sessao.php";
    include '../conexao.php';
    $id = $_POST['id'];
    try{
       $stmt = $pdo->prepare("SELECT * FROM viaturas WHERE id_viatura = $id");
       $executa = $stmt->execute();
    }catch(PDOException $e){
		echo $e->getMessage();
                
    }
    while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
    $id = $reg->id_viatura;
    $viatura = $reg->viatura;
    $modelo = $reg->modelo;
    $placa = $reg->placa;
    $odometro = $reg->odometro;
    $cap_tanque = $reg->cap_tanque;
    $consumo_padrao = $reg->consumo_padrao;
    $cap_transp = $reg->cap_transp;
    }
?>


       <fieldset>
           <legend>Cadastro de Viatura</legend>
                <table border=2px text-align='center' style='width: 40%'>
                    <form action="../executar.php" method="post">
                        <tr>
                            <td>Viatura</td>
                            <td><label for="viatura"><input class="form-control" type="text" style='width: 150px' id="viatura" name="viatura" placeholder="Viatura" required="required" value='<?php echo $viatura ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Modelo</td>
                            <td><label for="modelo"><input class="form-control" type="text" style='width: 150px' id="modelo" name="modelo" placeholder="Modelo" required="required" value='<?php echo $modelo ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Placa</td>
                            <td><label for="placa"><input class="form-control" type="text" style='width: 150px' id="placa" name="placa" placeholder="Placa" required="required" value='<?php echo $placa ?>'/></label><br /></td>
                        </tr>
                        <tr>
                            <td>Odômetro</td>
                            <td><label for="odometro"><input class="form-control" type="number" style='width: 150px' id="odometro" name="odometro" placeholder="Odometro" required="required" value='<?php echo $odometro ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Capacidade do Tanque</td>
                            <td><label for="cap_tanque"><input class="form-control" type="number" style='width: 150px' id="cap_tanque" name="cap_tanque" placeholder="Capacidade Tanque" required="required" value='<?php echo $cap_tanque ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Consumo</td>
                            <td><label for="cons_padrao"><input class="form-control" type="number" style='width: 150px' id="cons_padrao" name="cons_padrao" placeholder="Consumo Km/L" required="required" value='<?php echo $consumo_padrao ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Capacidade de Transporte</td>
                            <td><label for="cap_transp"><input class="form-control" type="number" style='width: 150px' id="cap_transp" name="cap_transp" placeholder="Cap Transp Pessoas" required="required" value='<?php echo $cap_transp ?>'/></label></td>
                        </tr>
                        <tr>
                            <td>Habilitação Necessária</td>
                            <td><label for="habilitacao"><select class="form-control" name="habilitacao">
                                        <?php
                                            include 'relacao_habilitacao.php';
                                        ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Situação</td>
                            <td><label for="situacao"><select class="form-control" name="situacao">
                                         <?php
                                            include 'relacao_disponibilidade.php';
                                         ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                            <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_viatura" name="enviar">Atualizar</button></label></td>
                        </tr>
                    </form>
                </table>
       </fieldset>
   </BODY>
</HTML>

<?php
include 'tabela_vtr_cadastradas.php';
?>