/*Remove atributo required em percurso*/
function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}
/*Remove atributo required em percurso*/

/*Coloca datepicker nas datas*/
$(function () {
    $('#data_inicio').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        currentText: 'Hoje',
        nextText: 'Pr&oacute;ximo',
        prevText: 'Anterior'
    });

    $('#data_fim').datepicker({
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        currentText: 'Hoje',
        nextText: 'Pr&oacute;ximo',
        prevText: 'Anterior'
    });
    /*Coloca datepicker nas datas*/

    /*Autocompleta o destino em percurso*/
    $("#destino").autocomplete({
        source: "../model/buscador.php",
        minLength: 3
    });
    /*Autocompleta o destino em percurso*/

    /*Completa o motorista e o odometro em percurso*/
    $('#viatura').change(function () {
        $('#motorista').load('../model/listaMotoristas.php?viatura=' + $('#viatura').val());
        $('#odo_saida').load('../model/odometro.php?viatura=' + $('#viatura').val());
    });
    /*Completa o motorista e o odometro em percurso*/

    /*Completa modelos no cadastro de viatura*/
    $('#marca').change(function () {
        $('#modelo').load('../model/listaModelos.php?marca=' + $('#marca').val());
    });
    /*Completa modelos no cadastro de viatura*/

    /*Verifica se a marca existe*/
    $('#marca').keyup(function () {
        $('#alerta').load('../model/verificaMarca.php?' + $.param({marca: $('#marca').val()}));
    });
    /*Verifica se a marca existe*/

    /*Verifica se a modelo existe*/
    $('#modelo').keyup(function () {
        $('#alerta').load('../model/verificaModelo.php?' + $.param({marca_modelo: $('#marca_modelo').val(), modelo: $('#modelo').val()}));
    });
    /*Verifica se a modelo existe*/
    
    /*Completa o tipo de combustivel*/
    $('#combustivel').change(function () {
        $('#tp').load('../model/listaTipoCombustivel.php?' + $.param({combustivel: $('#combustivel').val()}));
    });
    /*Completa o tipo de combustivel*/
    
    /*Define o maximo de combustivel que poder ser abastecido*/
    $('#tp').change(function () {
        $('#qnt').load('../model/qntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val()}));
        $('#alerta').load('../model/informaQntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val(), qnt: $('#qnt').val()}));
    });
    /*Define o maximo de combustivel que poder ser abastecido*/
    
    /*Informa a quantidade de combustivel*/
    $('#qnt').keyup(function () {
        $('#qnt').load('../model/qntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val()}));
        $('#alerta').load('../model/informaQntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val(), qnt: $('#qnt').val()}));
    });
    /*Informa a quantidade de combustivel*/

    /*Verificar as datas*/
    $('#data_fim').change(function () {
        var data_inicio = $('#data_inicio').val();
        var data_fim = $('#data_fim').val();
        var compara1 = parseInt(data_inicio.split("/")[2].toString() + data_inicio.split("/")[1].toString() + data_inicio.split("/")[0].toString());
        var compara2 = parseInt(data_fim.split("/")[2].toString() + data_fim.split("/")[1].toString() + data_fim.split("/")[0].toString());
        if (compara1 > compara2) {
            window.alert('A Data Fim é menor que a Data Início')
            $('#enviar').attr('disabled', 'disabled');
        } else {
            $('#enviar').removeAttr('disabled');
        }
    });
    /*Verificar as datas*/

    /*Modal dos motoristas*/
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var sigla = button.data("sigla")
        var nome = button.data("nome")
        var categoria = button.data("categoria")
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
        modal.find('.nome input').val(nome)
        modal.find('.sigla input').val(sigla)
        modal.find('.categoria input').val(categoria)
    });
});
/*Modal dos motoristas*/
