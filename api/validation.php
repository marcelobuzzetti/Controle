<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';
use Rakit\Validation\Validator;
$validator = new Validator;

$_POST = json_decode(file_get_contents("php://input"),true);

function setResponseCode($code, $reason = null) {
    $code = intval($code);

    if (version_compare(phpversion(), '5.4', '>') && is_null($reason))
        http_response_code($code);
    else
        header(trim("HTTP/1.0 $code $reason"));

}

if (isset($_SESSION['key']) && $_SESSION['key'] == $_POST['token'])
  {
      // make it
      $validation = $validator->make($_POST + $_FILES, [
        'viatura'                  => 'required|integer',
        'motorista'                 => 'required|integer',
        'destino'              => 'required',
        'odo_saida'      => 'required',
        'usuario'                => 'required',
        'senha'                => 'required',
        'token'                => 'required',
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {
        $errors = $validation->errors();
        print_r($errors->firstOfAll());
        setResponseCode(401,'Get back to the shadow');
    } else {
        echo http_response_code(200);
    }
      } else {
    echo http_response_code(400);
  }


?>