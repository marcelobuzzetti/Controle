<?php

define('DB_SERVER', 'localhost');
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
?>