<?php

$contador = 1;
include '../conexao.php';
try {
    $stmt = $pdo->prepare("SELECT id_motorista, nome, habilitacoes.categoria AS categoria, sigla
           FROM motoristas, habilitacoes, posto_grad
           WHERE motoristas.id_habilitacao = habilitacoes.id_habilitacao
           AND motoristas.id_posto_grad = posto_grad.id_posto_grad");
    $executa = $stmt->execute();

    if ($executa) {
        echo "<table border=2px >
                 <caption>Motoristas Cadastrados</caption>
                    <tr>
                        <td>Ordem</td>
                        <td>Posto/Grad</td>
                        <td>Nome de Guerra</td>
                        <td>Categoria</td>
                        <td></td>
                        <td></td>
                        </tr>";

        while ($reg = $stmt->fetch(PDO::FETCH_OBJ)) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
            echo "<td>$contador</td>";
            echo "<td>" . $reg->sigla . "</td>";
            echo "<td>" . $reg->nome . "</td>";
            echo "<td>" . $reg->categoria . "</td>";
            echo "<form action='../executar.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_motorista . "' value='" . $reg->id_motorista . "' name='id'/>
                                    <td><input class='btn btn-danger' type='submit' id='apagar' name='enviar' value='Apagar Motorista'/></form></td>";
            echo "</form>";
            echo "<form action='update_motorista.php' method='post'>
                                    <input type='hidden' id='" . $reg->id_motorista . "' value='" . $reg->id_motorista . "' name='id'/>
                                    <td><input class='btn btn-success' type='submit' id='apagar' name='enviar' value='Atualizar Motorista'/></form></td>";
            echo "</form></tr>";
            $contador++;
        }
        echo "</table>";
    } else {
        echo 'Erro ao inserir os dados';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
