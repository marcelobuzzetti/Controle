<?php

session_start();

class Sessao {

    function tempo() {
        if ($_SESSION['temposessao']) {
            if ($_SESSION['temposessao'] < time()) {
                $_SESSION['timeout'] = 1;
                header('Location: ' . constant("HOST"));
            } else {
                $_SESSION["temposessao"] = time() + 120;
            }
        }
    }
}
