<?php
//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
/* ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100); */
//maybe you want to precise the save path as well
//ini_set('session.save_path', '');

/* define o limitador de cache para 'private' */

/* session_cache_limiter('private');
$cache_limiter = session_cache_limiter(); */

/* define o prazo do cache em 30 minutos */
/* session_cache_expire(60 * 60 * 24 * 100);
$cache_expire = session_cache_expire(); */

//then start the session

$_SESSION['login'] = '';
$_SESSION['perfil'] = '';

class Login extends Model {
    
    function Acesso() {
        if (isset($_SESSION['login']) == TRUE) {
            if ($_SESSION['perfil'] == 1) {
                header('Location: /percurso');
            }
            if ($_SESSION['perfil'] == 2) {
                header('Location: /percurso');
            }
            if ($_SESSION['perfil'] == 3) {
                header('Location: /viaturascadastradas');
            }
            if ($_SESSION['perfil'] == 4) {
                header('Location: /relatorio');
            }
            if ($_SESSION['perfil'] == 5) {
                header('Location: /militarescadastrados');
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
