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
       $stmt = $pdo->prepare("SELECT * FROM rcb_comb WHERE rcb_id = $id");
       $executa = $stmt->execute();
    }catch(PDOException $e){
		echo $e->getMessage();
                
    }
    while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
    $id = $reg->rcb_id;
    $qnt = $reg->rcb_qnt;
    $motivo = $reg->rcb_motivo;
    }
?>


        <fieldset>
           <legend>Recebimento de Combustível</legend>
                <table border=2px text-align='center' style='width: 40%'>
                    <form action="../executar.php" method="post">
                        <tr>
                            <td>Combustível</td>
                            <td><label for="tp_comb"><select class="form-control" name="tp_comb">
                                       <?php
                                            include 'relacao_tipo_comb.php';
                                       ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td><label for="tp"><select class="form-control" name="tp">
                                       <?php
                                            include 'relacao_tipo.php';
                                       ?>
                                    </select></label></td>
                        </tr>
                        <tr>
                            <td>Quantidade</td>
                            <td><label for="qnt"><input class="form-control" type="number" style='width: 150px' id="qnt" name="qnt" placeholder="Quantidade" required="required" min="1" value="<?php echo $qnt ?>"/></label><br /></td>
                        </tr>
                        <tr>
                            <td>Motivo</td>
                            <td><label for="motivo"><input class="form-control" type="text" style='width: 150px' id="motivo" name="motivo" placeholder="Descrição do Motivo" required="required" value="<?php echo $motivo ?>"/></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <input type='hidden' id='<?php echo $id ?>' value='<?php echo $id ?>' name='id'/>
                            <td><label><button type="submit" class="btn btn-primary" id="enviar" value="atualizar_rcb_comb" name="enviar">Atualizar</button></label></td>
                        </tr>
                    </form>
                </table>
       </fieldset>
   </BODY>
</HTML>

<?php
include 'tabela_relacao_rcb_comb.php';
?>