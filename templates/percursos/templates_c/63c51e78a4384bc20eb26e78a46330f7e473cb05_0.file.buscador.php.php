<?php /* Smarty version 3.1.28-dev/66, created on 2015-10-20 20:58:11
         compiled from "/var/www/html/controle/configs/buscador.php" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5626c703c6a9a1_05659530',
  'file_dependency' => 
  array (
    '63c51e78a4384bc20eb26e78a46330f7e473cb05' => 
    array (
      0 => '/var/www/html/controle/configs/buscador.php',
      1 => 1445381439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5626c703c6a9a1_05659530')) {
function content_5626c703c6a9a1_05659530 ($_smarty_tpl) {
echo '<?php

';?>define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'apollo87');
define('DB_NAME', 'controle1');
if (isset($_GET['term'])) {
    $return_arr = array();
    try {
        $conn = new PDO("mysql:host=" . DB_SERVER . ";port=3306;dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT nome_destino FROM destinos WHERE nome_destino LIKE :term');
        $stmt->execute(array('term' => '%' . $_GET['term'] . '%'));

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['nome_destino'];
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
<?php echo '?>';
}
}
