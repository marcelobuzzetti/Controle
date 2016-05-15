<?php

session_start();

class Login {

    function Acesso() {
        if (isset($_SESSION['login'])) {
           header('Location: ' . constant("HOST").'/inicio');
        } else {
            if ($_SESSION['erro'] == 1) {
                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Usuário e/ou Senha não cadastrados</strong>
                         </div>";
            }
            if ($_SESSION['timeout'] == 1) {
                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Realizar o Login</strong>
                         </div>";
            }
            session_destroy();
        }
    }
}
