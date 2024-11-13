<?php
// Ativar o buffer de saída
ob_start();

include __DIR__ . '/include/config.inc.php';

// Obter a URL solicitada
$request = trim($_SERVER['REQUEST_URI'], '/');

// Definir as rotas
$routes = [
    '' => 'controller/home.php',
    'alterarusuario' => 'controller/alterarusuario.php',
    'alteracaovtr' => 'controller/alteracao_viatura.php',
    'alteracaovtrcadastrada' => 'controller/alteracao_viatura_cadastrada.php',
    'inicio' => 'controller/inicio.php',
    'abastecimento' => 'controller/abastecimento.php',
    'abastecimentoespecial' => 'controller/abastecimento_especial.php',
    'abastecimentorealizado' => 'controller/abastecimentorealizado.php',
    'acidentevtr' => 'controller/acidente_viatura.php',
    'acidentevtrcadastrado' => 'controller/acidente_viatura_cadastrado.php',
    'cautelavtr' => 'controller/cautela_viatura.php',
    'combustiveldisponivel' => 'controller/combustiveldisponivel.php',
    'combustivel' => 'controller/combustivel.php',
    'combustiveiscadastrados' => 'controller/combustivelcadastrado.php',
    'detalhemotorista' => 'controller/detalhemotorista.php',
    'detalheviatura' => 'controller/detalheviatura.php',
    'disponibilidadevtr' => 'controller/disponibilidade_viatura.php',
    'disponibilidadevtrcadastrada' => 'controller/disponibilidade_viatura_cadastrada.php',
    'manutencaovtr' => 'controller/manutencao_viatura.php',
    'manutencaovtrcadastrada' => 'controller/manutencao_viatura_cadastrada.php',
    'marca' => 'controller/marca.php',
    'marcacadastrada' => 'controller/marcacadastrada.php',
];

// Verificar se a rota existe
if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else {
    // Página não encontrada
    http_response_code(404);
    echo "404 - Página não encontrada";
}

// Enviar o buffer de saída
ob_end_flush();