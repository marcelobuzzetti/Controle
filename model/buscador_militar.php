<?php

include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

if (isset($_GET['term'])) {
    $return_arr = array();
    try {
        $stmt = $pdo->prepare("SELECT CONCAT(sigla,' ',nome) AS apelido 
                                            FROM militares, posto_grad 
                                            WHERE nome LIKE :term 
                                            AND posto_grad.id_posto_grad = militares.id_posto_grad
                                            AND militares.id_status = 1");
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