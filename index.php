<?php
// Ativar o buffer de saída
ob_start();

include_once __DIR__ . '/include/config.inc.php';

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/' :
        require __DIR__ . '/controller/home.php';
        break;
    case '/alterarusuario' :
        require __DIR__ . '/controller/alterarusuario.php';
        break;
    case '/alteracaovtr' :
        require __DIR__ . '/controller/alteracao_viatura.php';
        break;
    case '/alteracaovtrcadastrada' :
        require __DIR__ . '/controller/alteracao_viatura_cadastrada.php';
        break;
    case '/inicio' :
        require __DIR__ . '/controller/inicio.php';
        break;
    case '/abastecimento' :
        require __DIR__ . '/controller/abastecimento.php';
        break;
    case '/abastecimentoespecial' :
        require __DIR__ . '/controller/abastecimento_especial.php';
        break;
    case '/abastecimentorealizado' :
        require __DIR__ . '/controller/abastecimentorealizado.php';
        break;
    case '/acidentevtr' :
        require __DIR__ . '/controller/acidente_viatura.php';
        break;
    case '/acidentevtrcadastrado' :
        require __DIR__ . '/controller/acidente_viatura_cadastrado.php';
        break;
    case '/cautelavtr' :
        require __DIR__ . '/controller/cautela_viatura.php';
        break;
    case '/combustiveldisponivel' :
        require __DIR__ . '/controller/combustiveldisponivel.php';
        break;
    case '/combustivel' :
        require __DIR__ . '/controller/combustivel.php';
        break;
    case '/combustiveiscadastrados' :
        require __DIR__ . '/controller/combustivelcadastrado.php';
        break;
    case '/detalhemotorista' :
        require __DIR__ . '/controller/detalhemotorista.php';
        break;
    case '/detalheviatura' :
        require __DIR__ . '/controller/detalheviatura.php';
        break;
    case '/disponibilidadevtr' :
        require __DIR__ . '/controller/disponibilidade_viatura.php';
        break;
    case '/disponibilidadevtrcadastrada' :
        require __DIR__ . '/controller/disponibilidade_viatura_cadastrada.php';
        break;
    case '/manutencaovtr' :
        require __DIR__ . '/controller/manutencao_viatura.php';
        break;
    case '/manutencaovtrcadastrada' :
        require __DIR__ . '/controller/manutencao_viatura_cadastrada.php';
        break;
    case '/marca' :
        require __DIR__ . '/controller/marca.php';
        break;
    case '/marcacadastrada' :
        require __DIR__ . '/controller/marcacadastrada.php';
        break;
    case '/modelo' :
        require __DIR__ . '/controller/modelo.php';
        break;
    case '/modelocadastrado' :
        require __DIR__ . '/controller/modelocadastrado.php';
        break;
    case '/militar' :
        require __DIR__ . '/controller/militar.php';
        break;
    case '/militarescadastrados' :
        require __DIR__ . '/controller/militarescadastrados.php';
        break;
    case '/militaresinativos' :
        require __DIR__ . '/controller/militaresinativos.php';
        break;
    case '/motorista' :
        require __DIR__ . '/controller/motorista.php';
        break;
    case '/motoristascadastrados' :
        require __DIR__ . '/controller/motoristacadastrado.php';
        break;
    case '/motoristasinativos' :
        require __DIR__ . '/controller/motoristasinativos.php';
        break;
    case '/percurso' :
        require __DIR__ . '/controller/percurso.php';
        break;
    case '/percurso_guarda' :
        require __DIR__ . '/controller/percurso_guarda.php';
        break;
    case '/recebimentocombustivel' :
        require __DIR__ . '/controller/recebimentocombustivel.php';
        break;
    case '/recebimentocombustivelcadastrado' :
        require __DIR__ . '/controller/recebimentocombustivelcadastrado.php';
        break;
    case '/relatorio' :
        require __DIR__ . '/controller/relatorio.php';
        break;
    case '/relatoriocombustivel' :
        require __DIR__ . '/controller/relatoriocombustivel.php';
        break;
    case '/relatoriovtr' :
        require __DIR__ . '/controller/relatoriovtr.php';
        break;
    case '/relatoriomotorista' :
        require __DIR__ . '/controller/relatoriomotorista.php';
        break;
    case '/tipocombustivel' :
        require __DIR__ . '/controller/tipocombustivel.php';
        break;
    case '/tiposcombustiveiscadastrados' :
        require __DIR__ . '/controller/tipocombustivelcadastrado.php';
        break;
    case '/usuario' :
        require __DIR__ . '/controller/usuario.php';
        break;
    case '/usuarioscadastrados' :
        require __DIR__ . '/controller/usuarioscadastrados.php';
        break;
    case '/usuariosinativos' :
        require __DIR__ . '/controller/usuariosinativos.php';
        break;
    case '/viatura' :
        require __DIR__ . '/controller/viatura.php';
        break;
    case '/viaturascadastradas' :
        require __DIR__ . '/controller/viaturacadastrada.php';
        break;
    case '/viaturasindisponiveis' :
        require __DIR__ . '/controller/relatoriodisponibilidadeviatura.php';
        break;
    case '/json' :
        require __DIR__ . '/model/listaMilitares.php';
        break;
    case '/apicombustivel' :
        require __DIR__ . '/model/listaCombustivel.php';
        break;
    case '/apisiscofis' :
        require __DIR__ . '/model/siscofis.php';
        break;
    case '/apiviatura' :
        require __DIR__ . '/model/listaViaturas.php';
        break;
    case '/conexao' :
        require __DIR__ . '/model/conexao.php';
        break;
    case '/executar' :
        require __DIR__ . '/model/executar.php';
        break;
    case '/logout' :
        require __DIR__ . '/model/logout.php';
        break;
    case '/toastrcss' :
        require __DIR__ . '/node_modules/toastr/build/toastr.css';
        break;
    case '/toastrjs' :
        require __DIR__ . '/node_modules/toastr/toastr.js';
        break;
    case '/axios' :
        require __DIR__ . '/node_modules/axios/dist/axios.min.js';
        break;
    case '/testeuser' :
        require __DIR__ . '/api/test.php';
        break;
    case '/validation' :
        require __DIR__ . '/api/validation.php';
        break;
    case '/viaturasrodando' :
        require __DIR__ . '/api/viaturasrodando.php';
        break;
    case '/buscadormilitar' :
        require __DIR__ . '/model/buscador_militar.php';
        break;
    case '/buscacidades' :
        require __DIR__ . '/model/listaCidades.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/controller/404.php';
        break;
}

// Enviar o buffer de saída
ob_end_flush();