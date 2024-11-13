<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

$_POST = json_decode(file_get_contents("php://input"),true);

if (isset($_SESSION['key']) && $_SESSION['key'] == $_POST['token'])
  {
      try{
          $pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "$password");
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
      }
       /*    if (!$pdo) {
              die("Erro ao criar a conexão");
          } */
      
      //Lidando com caracteres especiais
      $stmt = $pdo->prepare("SET NAMES 'utf8'");
      $executa = $stmt->execute();
      
      $stmt = $pdo->prepare('SET character_set_connection=utf8');
      $executa = $stmt->execute();
      
      $stmt = $pdo->prepare('SET character_set_client=utf8');
      $executa = $stmt->execute();
      
      $stmt = $pdo->prepare('SET character_set_results=utf8');
      $executa = $stmt->execute();
      
      $login = $_POST['usuario'];
      $senha = md5($_POST['senha']);
      
      try {
          $stmt = $pdo->prepare('SELECT COUNT(*) AS total 
                                              FROM usuarios 
                                              WHERE login = ? 
                                              AND senha = ?
                                              AND id_status != 2');
          $stmt->bindParam(1, $login, PDO::PARAM_STR);
          $stmt->bindParam(2, $senha, PDO::PARAM_STR);
          $stmt->execute();
      
          $resultado = $stmt->fetch();
          
          if($resultado['total'] > 0){
              echo http_response_code(200);
          } else {
              echo http_response_code(400);
          }
      } catch (PDOException $e) {
          echo 'Error: ' . $e->getMessage();
      }
    /*   echo "Your name is: " . $_POST['username']; */
  } else {
    echo http_response_code(400);
  }


?>