<?php

include $_SERVER['DOCUMENT_ROOT'] . '/model/conexao.php';

if (isset($_GET['term'])) {
    $return_arr = array();
    try {
        $stmt = $pdo->prepare('SELECT descricao FROM abastecimentos_especiais WHERE descricao LIKE :term');
        $executa = $stmt->execute(array('term' => '%' . htmlspecialchars($_GET['term']) . '%'));

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['descricao'];
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
?>