<?php
    session_start();
    if($_SESSION['temposessao'] < time()){
      session_start();
        $_SESSION['timeout'] = 1;
       header ('Location: '.$endereco.'');
    } else {
        $_SESSION["temposessao"] = time() + 1200;
    }
?>