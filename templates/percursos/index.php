<?php
require_once('../../lib/smarty/Smarty.class.php');
        //include "verificarLogin.php";
        //include"../../menu.php";
        //include '../../sessao.php';
        //Inserido para criar o erro de inserção
        if ($_SESSION['mysql'] == 1) {
            echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Erro ao inserir dados</strong>
                         </div>";
        }
        //Inserido para criar o erro de inserção
        session_start();
        $_SESSION['mysql'] = 0;

$contador = 0;
$contador1 = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                            FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                            WHERE data_retorno IS NULL 
                                            AND percursos.id_motorista = motoristas.id_motorista
                                            AND percursos.id_viatura = viaturas.id_viatura
                                            AND viaturas.id_marca = marcas.id_marca
                                            AND viaturas.id_modelo = modelos.id_modelo
                                            AND percursos.id_destino = destinos.id_destino
                                            ORDER BY id_percurso DESC");
    $executa = $stmt->execute();
    
    if($executa){
         $tabela_relacao_vtr = $stmt->fetchAll(PDO::FETCH_ASSOC);  
           }else{
             echo 'Erro ao inserir os dados';
         }
   }catch(PDOException $e){
      echo $e->getMessage();
   }
   
   try {
    $stmt = $pdo->prepare("SELECT id_percurso, marcas.descricao AS marca, modelos.descricao AS  modelo, placa, motoristas.apelido, nome_destino, odo_saida, acompanhante, data_saida, hora_saida, odo_retorno, data_retorno, hora_retorno
                                            FROM percursos, viaturas, motoristas, marcas, modelos, destinos
                                            WHERE data_retorno IS NOT NULL 
                                            AND percursos.id_motorista = motoristas.id_motorista
                                            AND percursos.id_viatura = viaturas.id_viatura
                                            AND viaturas.id_marca = marcas.id_marca
                                            AND viaturas.id_modelo = modelos.id_modelo
                                            AND percursos.id_destino = destinos.id_destino
                                            AND data_retorno BETWEEN (SELECT DATE_SUB(date(now()), INTERVAL 7 DAY)) AND  (SELECT DATE(NOW()))
                                            ORDER BY id_percurso DESC");
    $executa = $stmt->execute();
    
    if($executa){
         $tabela_relacao_vtr_fechadas = $stmt->fetchAll(PDO::FETCH_ASSOC);  
           }else{
             echo 'Erro ao inserir os dados';
         }
   }catch(PDOException $e){
      echo $e->getMessage();
   }
   
   $smarty = new Smarty();
$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_vtr_fechadas);
$smarty->display('index.tpl');

?>