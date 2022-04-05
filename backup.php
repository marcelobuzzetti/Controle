<?php
// Backup do site atraves do Terminal
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$host = $_SERVER["DB_HOST"];
$db = $_SERVER["DB_DATABASE"];
$user = $_SERVER["DB_USERNAME"];
$password = $_SERVER["DB_PASSWORD"];  
date_default_timezone_set('America/Sao_Paulo');
$dtime = date('Y-m-d-H-i-s');
$backupfile = 'Backup_' . $dtime . '.sql';
$destino = "/var/www/html/Guarita/backups/".$backupfile;

system("mysqldump -u $user -p$password --lock-tables $db > $destino", $return);
if ($return == 0){
$mensagem = "<div class='list-group-item-success col-xs-12 col-sm-12 col-md-12'>Backup $backupfile do Banco de Dados gerado com sucesso!!!</div>";
$sendgrid_apikey = $_SERVER['SENDGRID_API_KEY'];
$sendgrid = new SendGrid($sendgrid_apikey);
$url = 'https://api.sendgrid.com/';
$proxy = '10.12.140.254:3126';
$proxyauth = 'ferreira:apollo';
$pass = $sendgrid_apikey;
//$fileName = 'Backup_2019-10-09-16-14-45.sql';
$filePath = 'backups';
$file = file_get_contents($filePath.'/'.$backupfile, true);
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
    'files['.$backupfile.']' => '@'.$file.'/'.$backupfile
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
if($teste === false){
    echo curl_error($session);
}
curl_close($session);
} else {
echo "erro";
}
