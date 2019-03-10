<?php

session_start();
$_SESSION['login'] = '';
$_SESSION['perfil'] = '';

class Login {
    
    function Acesso() {
        if (isset($_SESSION['login']) == TRUE) {
            if ($_SESSION['perfil'] == 1) {
                header('Location: ' . constant("HOST") . '/percurso');
            }
            if ($_SESSION['perfil'] == 2) {
                header('Location: ' . constant("HOST") . '/percurso');
            }
            if ($_SESSION['perfil'] == 3) {
                header('Location: ' . constant("HOST") . '/viaturascadastradas');
            }
            if ($_SESSION['perfil'] == 4) {
                header('Location: ' . constant("HOST") . '/relatorio');
            }
            if ($_SESSION['perfil'] == 5) {
                header('Location: ' . constant("HOST") . '/militarescadastrados');
            }
        } else {
            if ($_SESSION['erro'] === 1) {
                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Usuário e/ou Senha não cadastrados</strong>
                         </div>";
            }
            if ($_SESSION['timeout'] === 1) {
                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                            <strong>Realizar o Login</strong>
                         </div>";
            }
            session_destroy();
        }
    }

}
