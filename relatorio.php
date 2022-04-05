<?php
// Relatorio
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
date_default_timezone_set('America/Sao_Paulo');
$tipo = $_SERVER['DB_CONNECTION'];
$host = $_SERVER["DB_HOST"];
$db = $_SERVER["DB_DATABASE"];
$user = $_SERVER["DB_USERNAME"];
$password = $_SERVER["DB_PASSWORD"];  
try{
    $pdo = new PDO("$tipo:host=$host;dbname=$db", "$user", "$password");
} catch (PDOException $e){
    $log->gerarLogConexao($e,"Conexao.log");
    $dtime=date('Y-m-d H-i-s');
    $data = "[".$dtime."]"." ".$e."\n";
    error_log(print_r($data,true), 3, "logs/Conexao.log");
    die("Erro ao criar a conexão com o banco de dados. Contacte o Administrador");
}

//Lidando com caracteres especiais
$stmt = $pdo->prepare("SET NAMES 'utf8'");
$executa = $stmt->execute();

$stmt = $pdo->prepare('SET character_set_connection=utf8');
$executa = $stmt->execute();

$stmt = $pdo->prepare('SET character_set_client=utf8');
$executa = $stmt->execute();

$stmt = $pdo->prepare('SET character_set_results=utf8');
$executa = $stmt->execute();
//Lidando com caracteres especiais
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$inicio = date('Y-m-d', strtotime('-1 week'));
$fim = date('Y-m-d');

try{
    $stmt = $pdo->prepare("SELECT p.id_percurso, v.nome_completo AS nome_completo, v.cpf, v.rg, p.recado,
    DATE_FORMAT(p.data_entrada,'%d/%m/%Y') as data_entrada, p.hora_entrada,
    IFNULL(DATE_FORMAT(p.data_saida,'%d/%m/%Y'), 'Em trânsito') as data_saida, p.hora_saida,
    d.nome_destino AS destino, 
    c.cor, c.marca, c.modelo, c.placa,
    e.nome_empresa,
    IFNULL(u.nome_completo,'Admin') AS usuario_entrada,
    IFNULL(u1.nome_completo, 'Em trânsito') AS usuario_saida
    FROM percursos p
    LEFT JOIN carros c ON c.id_carro = p.id_carro
    LEFT JOIN empresas e ON p.id_empresa = e.id_empresa
    LEFT JOIN visitantes v ON p.id_visitante = v.id_visitante
    LEFT JOIN destinos d ON p.id_destino = d.id_destino
    LEFT JOIN usuarios u ON p.id_usuario_entrada = u.id_usuario
    LEFT JOIN usuarios u1 ON p.id_usuario_saida= u1.id_usuario
    WHERE (c.placa IS NULL OR c.placa IS NOT NULL 
    AND e.nome_empresa IS NULL OR e.nome_empresa IS NOT NULL)
    AND p.id_status = 1
    AND data_entrada BETWEEN ? AND ?
    OR data_saida BETWEEN ? AND ?
    OR (data_saida IS NULL AND p.id_status = 1)
    ORDER BY p.id_percurso");
    $stmt->bindParam(1, $inicio, PDO::PARAM_STR);
    $stmt->bindParam(2, $fim, PDO::PARAM_STR);
    $stmt->bindParam(3, $inicio, PDO::PARAM_STR);
    $stmt->bindParam(4, $fim, PDO::PARAM_STR);
    $executa = $stmt->execute();

    if ($executa) {
        $relatorios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print("<script language=JavaScript>
                    alert('Não foi possível criar tabela.');
                    </script>");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Guarita Santiago')
    ->setTitle('Relação de Visitantes');

// Add some data

$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Empresa')
    ->setCellValue('B1', 'Carro')
    ->setCellValue('C1', 'Nome Completo')
    ->setCellValue('D1', 'Destino')
    ->setCellValue('E1', 'Data e Hora da Entrada')
    ->setCellValue('F1', 'Anotador Entrada')
    ->setCellValue('G1', 'Data e Hora da Saída')
    ->setCellValue('H1', 'Anotador Saída')
    ->setCellValue('I1', 'Recado');
    $sheet = $spreadsheet->getActiveSheet();
    for($i = 0; $i < sizeof($relatorios); $i++){
        $sheet->setCellValue('A'.($i + 2), $relatorios[$i]["nome_empresa"]);
        $sheet->setCellValue('B'.($i + 2), $relatorios[$i]["placa"]."-".$relatorios[$i]["marca"]."-".$relatorios[$i]["modelo"]."-".$relatorios[$i]["cor"]);
        $sheet->setCellValue('C'.($i + 2), $relatorios[$i]["nome_completo"]);
        $sheet->setCellValue('D'.($i + 2), $relatorios[$i]["destino"]);
        $sheet->setCellValue('E'.($i + 2), $relatorios[$i]["data_entrada"]." ".$relatorios[$i]["hora_entrada"]);
        $sheet->setCellValue('F'.($i + 2), $relatorios[$i]["usuario_entrada"]);
        $sheet->setCellValue('G'.($i + 2), $relatorios[$i]["data_saida"]." ".$relatorios[$i]["hora_saida"]);
        $sheet->setCellValue('H'.($i + 2), $relatorios[$i]["usuario_saida"]);
        $sheet->setCellValue('I'.($i + 2), $relatorios[$i]["recado"]);
    }
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);


$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$name = 'Relatorio_Semanal_'.$fim.'_.xlsx';
$spreadsheet->getActiveSheet()
    ->setTitle('Visitantes');
$writer->save('/var/www/html/Guarita/relatorios/'.$name);
$inicio= date('d/m/Y', strtotime('-1 week'));
$fim = date('d/m/Y');
$email = new \SendGrid\Mail\Mail();
$email->setFrom("noreply@ferreira.com", "Relatorio");
$email->setSubject("Relatorio de Visitantes $inicio a $fim");
$tos = [ 
    "marcelobuzzetti@gmail.com" => "Marcelo Buzzetti"
];
$email->addTos($tos);
$email->addContent("text/plain", "Relatório Semanal de Visitantes");
$email->addContent(
"text/html", "<h1>Relatorio Semanal de Visitantes</h1> <p>De $inicio a $fim</p> <p></p>Marcelo Aparecido Ferreira Silva </p> <p></p>marcelobuzzetti@gmail.com</p>"
);

$file_encoded = base64_encode(file_get_contents('/var/www/html/Guarita/relatorios/'.$name));
$email->addAttachment(
    $file_encoded,
    "application/text",
    "Relatorio_Semanal.xlsx",
    "attachment"
);

$sendgrid = new \SendGrid($_SERVER['SENDGRID_API_KEY']);
try {
    $response = $sendgrid->send($email);
    /*print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";*/
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}

$filepath = realpath('/var/www/html/Guarita/relatorios/'.$name);
$post = array('chat_id' => $_SERVER["TELEGRAM_RELATORIO"],'document'=>new CurlFile($filepath));    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot" . $_SERVER["TELEGRAM_KEY"] . "/sendDocument");
curl_setopt($ch, CURLOPT_POST, 1);   
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_exec ($ch);
curl_close ($ch); 
