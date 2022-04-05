<?php



require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

class Log {

    function gerarLog($erro,$local){

        $dtime=date('Y-m-d H-i-s');
        $data = $erro;
        $data = implode("\n", $data);
        $token = $_SERVER["TELEGRAM_KEY"];
        $msg = [
            'text' => "\n$local\n$dtime\n".$data,
            'chat_id' => $_SERVER["TELEGRAM_CHAT"]
        ];
        set_error_handler(
            function ($severity, $message, $file, $line) {
                throw new ErrorException($message, $severity, $severity, $file, $line);
            }
        );
        try {
            $content = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($msg));
        } catch (Exception $e) {
            $dtime=date('Y-m-d H-i-s');
            $erro = "[".$dtime."] ".$e->getMessage()."\n";
            error_log(print_r($erro,true), 3, $_SERVER['DOCUMENT_ROOT'] ."./logs/Telegram_Error1.log");
        }        
        restore_error_handler();
    }

    function gerarLogConexao($erro,$local){

        $dtime=date('Y-m-d H-i-s');
        $data = $erro;
        $token = $_SERVER["TELEGRAM_KEY"];
        $msg = [
            'text' => "\n$local\n$dtime\n".$data,
            'chat_id' => $_SERVER["TELEGRAM_CHAT"]
        ];
        set_error_handler(
            function ($severity, $message, $file, $line) {
                throw new ErrorException($message, $severity, $severity, $file, $line);
            }
        );
        try {
            $content = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($msg));
        } catch (Exception $e) {
            $dtime=date('Y-m-d H-i-s');
            $erro = "[".$dtime."] ".$e->getMessage()."\n";
            error_log(print_r($erro,true), 3, $_SERVER['DOCUMENT_ROOT'] ."./logs/Telegram_Error2.log");
        }        
        restore_error_handler();
    }
}