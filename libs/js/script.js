function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}

function imprimir() {
    self.print();
}

$(function () {
    $('#data_inicio').datepicker({
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', '---', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        currentText: 'Hoje',
        nextText: 'Pr&oacute;ximo',
        prevText: 'Anterior'
    });

    $('#data_fim').datepicker({
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', '---', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        currentText: 'Hoje',
        nextText: 'Pr&oacute;ximo',
        prevText: 'Anterior'
    });

    $("#destino").autocomplete({
        source: "../model/buscador.php",
        minLength: 3
    });

    $('#viatura').change(function () {
        $('.Selecione').hide();
        $('#motorista').load('../model/listaMotoristas.php?viatura=' + $('#viatura').val());
    });
    
    $('#marca').change(function () {
        $('.Selecione').hide();
        $('#modelo').load('../model/listaModelos.php?marca=' + $('#marca').val());
    });
});
