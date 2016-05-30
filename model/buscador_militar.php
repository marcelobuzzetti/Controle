<?php
include '../model/conexao.php';

if (isset($_GET['term'])) {
    $return_arr = array();
    try {
        $stmt = $pdo->prepare('SELECT apelido FROM motoristas WHERE apelido LIKE :term');
        $executa = $stmt->execute(array('term' => '%' . $_GET['term'] . '%'));

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['apelido'];
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
?>