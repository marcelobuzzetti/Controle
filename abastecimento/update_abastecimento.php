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
    include("../verificarLogin.php");
    include"../menu.php";
    include "../sessao.php";
    include '../conexao.php';
    $id = $_POST['id'];
    try{
       $stmt = $pdo->prepare("SELECT * FROM abastecimentos WHERE abast_id = $id");
       $executa = $stmt->execute();
    }catch(PDOException $e){
		echo $e->getMessage();
                
    }
    while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
    $id = $reg->abast_id;
    $nrvale = $reg->abast_nrvale;
    $qnt = $reg->abast_qnt;
    
    }
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
                            <td><label for="nrvale"><input class="form-control" type="text" style='width: 150px' id="nrvale" name="nrvale" placeholder="Numero do Vale" required="required" value="<?php echo $nrvale ?>"/></label></td>
                            <td><label for="motorista"><select class="form-control" name="motorista" required="required">
                                                            <?php
                                                            include 'relacao_motorista.php';
                                                            ?>
                                </select></label></td>
                             <td><label for="viatura" ><select class="form-control" name="viatura" required="required">
                                                            <?php
                                                            include 'relacao_vtr.php';
                                                            ?>
                                </select></label></td>
                                 <td><label for="tp_comb"><select class="form-control" name="tp_comb">
                                       <?php
                                            include 'relacao_tipo_comb.php';
                                       ?>
                                    </select></label></td>
                                    <td><label for="tp"><select class="form-control" name="tp">
                                       <?php
                                            include 'relacao_tipo.php';
                                       ?>
                                    </select></label></td>
                        <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                        <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" value="<?php echo $qnt ?>"/></label></td>
                        <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_abst" name="enviar">Atualizar</button></label></td>
                    </tr>
                </table>
            </form>
       </fieldset>
   </BODY>
</HTML>

<?php
include 'tabela_relacao_abastecimentos.php';
?>