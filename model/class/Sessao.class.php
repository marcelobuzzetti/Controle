<?php





class Sessao extends Model {

    function tempo() {
        if ($_SESSION['temposessao']) {
            if ($_SESSION['temposessao'] < time()) {
                $_SESSION['timeout'] = 1;
                header('Location: /');
            } else {
                $_SESSION["temposessao"] = time() + 120;
            }
        }
    }

}
