<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/config.inc.php';
$id = $_POST['id'];

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Output\{QRCodeOutputException, QRImage};

$filename = $_SERVER['DOCUMENT_ROOT'].'/libs/imagens/brasao.png';

if (file_exists($filename) && exif_imagetype($filename) == IMAGETYPE_PNG) {
	class QRImageWithLogo extends QRImage{

		/**
		 * @param string|null $file
		 * @param string|null $logo
		 *
		 * @return string
		 * @throws \chillerlan\QRCode\Output\QRCodeOutputException
		 */
		public function dump(string $file = null, string $logo = null):string{
			// set returnResource to true to skip further processing for now
			$this->options->returnResource = true;
	
			// of course you could accept other formats too (such as resource or Imagick)
			// i'm not checking for the file type either for simplicity reasons (assuming PNG)
			if(!is_file($logo) || !is_readable($logo)){
				throw new QRCodeOutputException('invalid logo');
			}
	
			$this->matrix->setLogoSpace(
				$this->options->logoSpaceWidth,
				$this->options->logoSpaceHeight
				// not utilizing the position here
			);
	
			// there's no need to save the result of dump() into $this->image here
			parent::dump($file);
	
			$im = imagecreatefrompng($logo);
	
			// get logo image size
			$w = imagesx($im);
			$h = imagesy($im);
	
			// set new logo size, leave a border of 1 module (no proportional resize/centering)
			$lw = ($this->options->logoSpaceWidth - 2) * $this->options->scale;
			$lh = ($this->options->logoSpaceHeight - 2) * $this->options->scale;
	
			// get the qrcode size
			$ql = $this->matrix->size() * $this->options->scale;
	
			// scale the logo and copy it over. done!
			imagecopyresampled($this->image, $im, ($ql - $lw) / 2, ($ql - $lh) / 2, 0, 0, $lw, $lh, $w, $h);
	
			$imageData = $this->dumpImage();
	
			if($file !== null){
				$this->saveToFile($imageData, $file);
			}
	
			if($this->options->imageBase64){
				$imageData = 'data:image/'.$this->options->outputType.';base64,'.base64_encode($imageData);
			}
	
			return $imageData;
		}
	
	}
	
	class LogoOptions extends QROptions{
		// size in QR modules, multiply with QROptions::$scale for pixel size
		protected int $logoSpaceWidth;
		protected int $logoSpaceHeight;
	}
	
	$options = new LogoOptions;
	
	$options->versionMin          = 19;
	$options->versionMax          = 40;
	$options->eccLevel         = QRCode::ECC_H;
	$options->imageBase64      = true;
	$options->logoSpaceWidth   = 35;
	$options->logoSpaceHeight  = 40;
	$options->scale            = 3;
	$options->imageTransparent = false;
}


if (isset($_SESSION['login']) == FALSE || ($_SESSION['perfil'] == 2 || $_SESSION['perfil'] == 5) || isset($id) == FALSE) {
    header('Location: /percurso');
} else {

    $viaturas = new Viatura();
    $relacao_viaturas = $viaturas->detalharViatura($id);

    $relacao_percursos = $viaturas->listarPercursos($id);

    $relacao_motoristas = $viaturas->listarMotorista($id);

    $relacao_acidentes = $viaturas->listarAcidente($id);

    $relacao_manutencao = $viaturas->listarMnt($id);

    $relacao_abastecimentos = $viaturas->listarAbastecimentos($id);

    $relacao_alteracao = $viaturas->listarAlteracaoVtr($id);
	
	$alteracao = new AlteracaoViatura();
    $relacao_disponibilidade = $alteracao->listarDisponibilidade($id);

    $data = "Marca: " . $relacao_viaturas[0]["marca"]
     . "\nModelo: " . $relacao_viaturas[0]["modelo"]
	 ."\nAno: ".$relacao_viaturas[0]["ano"]
     . "\nEB/Placa: " . $relacao_viaturas[0]["placa"] 
     . "\nTipo: " .$relacao_viaturas[0]["tipo_viatura"]
     . "\nCapacida do Tanque: " .$relacao_viaturas[0]["cap_tanque"] 
     ."Lts\nConsumo Padrão: ".$relacao_viaturas[0]["consumo_padrao"]
     ."Km/L\nCapacidade de Transporte: ".$relacao_viaturas[0]["cap_transp"]
     ."\nCNH: ".$relacao_viaturas[0]["categoria"];

	if (file_exists($filename) && exif_imagetype($filename) == IMAGETYPE_PNG){
		$qrOutputInterface = new QRImageWithLogo($options, (new QRCode($options))->getMatrix("$data"));
		$teste = $qrOutputInterface->dump(null, $filename);
	} else {
		$teste = (new QRCode)->render($data);
	}

    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);

    $smarty->assign('data', $teste);
    $smarty->assign('titulo', 'Viatura ' . $relacao_viaturas[0]['marca'] . ' ' . $relacao_viaturas[0]['modelo'] . ' ' . $relacao_viaturas[0]['placa'] . '  Detalhada ');
	$smarty->assign('nome_imagem', 'Viatura ' . $relacao_viaturas[0]['marca'] . ' ' . $relacao_viaturas[0]['modelo'] . ' ' . $relacao_viaturas[0]['placa']);
    $smarty->assign('relacao_viaturas', $relacao_viaturas);
    $smarty->assign('relacao_percursos', $relacao_percursos);
    $smarty->assign('relacao_motoristas', $relacao_motoristas);
    $smarty->assign('relacao_manutencao', $relacao_manutencao);
    $smarty->assign('relacao_acidentes', $relacao_acidentes);
    $smarty->assign('relacao_abastecimentos', $relacao_abastecimentos);
    $smarty->assign('relacao_alteracao', $relacao_alteracao);
	$smarty->assign('relacao_disponibilidade', $relacao_disponibilidade);
    $smarty->assign('login', $_SESSION['login']);
    $smarty->display('./headers/header_datatables.tpl');
    $smarty->display($menu);
    $smarty->display('detalheviatura.tpl');
    $smarty->display('./footer/footer_detalhes.tpl');
}
?>