<?php
require_once('../../lib/smarty/Smarty.class.php');
      //  include "verificarLogin.php";
      //  include '../../sessao.php';

$contador = 0;

include '../../configs/conexao.php';
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
               print("<script language=JavaScript>
               alert('Não foi possível criar tabela.');
               </script>");
               
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
             print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
         }
   }catch(PDOException $e){
      echo $e->getMessage();
   }
   
   try {
    $stmt = $pdo->prepare("SELECT id_motorista, apelido 
                                               FROM motoristas
                                               WHERE id_motorista
                                               NOT IN (SELECT id_motorista
                                                             FROM percursos
                                                             WHERE data_retorno IS NULL)
                                               ORDER BY nome;");
    $executa = $stmt->execute();

      if($executa){
         $relacao_motoristas= $stmt->fetchAll(PDO::FETCH_ASSOC);  
           }else{
             print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
         }
} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $stmt = $pdo->prepare("SELECT id_viatura ,marcas.descricao AS marca,modelos.descricao AS  modelo,placa
                                               FROM viaturas, marcas, modelos
                                               WHERE viaturas.id_marca = marcas.id_marca 
                                               AND viaturas.id_modelo = modelos.id_modelo 
                                               AND id_viatura NOT IN (SELECT id_viatura 
                                                                                     FROM percursos 
                                                                                     WHERE data_retorno IS NULL)
                                               AND id_situacao != 2
                                               ORDER BY marcas.descricao AND modelos.descricao;");
    $executa = $stmt->execute();

     if($executa){
         $relacao_viaturas= $stmt->fetchAll(PDO::FETCH_ASSOC);  
           }else{
             print("<script language=JavaScript>
             alert('Não foi possível criar tabela.');
             </script>");
         }
} catch (PDOException $e) {
    echo $e->getMessage();
}
   
$smarty = new Smarty();
$smarty->assign('contador', $contador);
$smarty->assign('tabela_relacao_vtr', $tabela_relacao_vtr);
$smarty->assign('tabela_relacao_vtr_fechadas', $tabela_relacao_vtr_fechadas);
$smarty->assign('relacao_motoristas', $relacao_motoristas);
$smarty->assign('relacao_viaturas', $relacao_viaturas);
$smarty->display('index.tpl');

?>