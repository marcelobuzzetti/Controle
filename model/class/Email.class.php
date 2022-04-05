<?



require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();
class Email {

    function enviaEmail($fileName, $dtime){        
        $log = new Log();        
        $sendgrid_apikey = $_SERVER['SENDGRID_API_KEY'];
        $sendgrid = new SendGrid($sendgrid_apikey);
        $url = 'https://api.sendgrid.com/';
        $proxy = '10.12.140.254:3126';
        $proxyauth = 'ferreira:apollo';
        $pass = $sendgrid_apikey;
        //$fileName = 'Backup_2019-10-09-16-14-45.sql';
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/backups';
        $file = file_get_contents($filePath.'/'.$fileName, true);
        $template_id = '<your_template_id>';
        $js = array(
          'sub' => array(':name' => array('Elmer')),
          'filters' => array('templates' => array('settings' => array('enable' => 1)))
        );
        
        $params = array(
            'to'        => "marcelobuzzetti@gmail.com",
            'toname'    => "Administrador",
            'from'      => "noreply@ferreira.com",
            'fromname'  => "Guarita Santiago",
            'subject'   => "Backup de ".$dtime,
            'text'      => "Backup de ".$dtime,
            'html'      => "<strong>Backup de ".$dtime."</strong>",
            'x-smtpapi' => json_encode($js),
            'files['.$fileName.']' => '@'.$file.'/'.$fileName
          );
        
        $request =  $url.'api/mail.send.json';
        
        // Generate curl request
        $session = curl_init($request);
        // Tell PHP not to use SSLv3 (instead opting for TLS)
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        //NO SSL
        //curl_setopt($session, CURLOPT_SSL_VERIFYPEER, 0);
        //curl_setopt($session, CURLOPT_SSL_VERIFYHOST, 0);
        //Proxy
        //curl_setopt($session, CURLOPT_PROXY, $proxy);
        //curl_setopt($session, CURLOPT_PROXYUSERPWD, $proxyauth);
        // obtain response

        $teste = curl_exec($session);
        if($teste === FALSE){
            $dtime=date('Y-m-d H-i-s');
            $erro = "[".$dtime."] ".curl_error($session)."\n";
            $log->gerarLogConexao($erro,"Email.log");
            error_log(print_r($erro,true), 3, $_SERVER['DOCUMENT_ROOT'] ."./logs/Email.log");
        }

        curl_close($session);
        }
}