function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}

function imprimir() {
    self.print();
}

$(function () {
    $('input[name=data_inicio]').datepicker({
        showButtonPanel:true,
        dateFormat: 'yy-mm-dd'
    });
    $('input[id=data_fim]').datepicker({
        showButtonPanel:true,
        dateFormat: 'yy-mm-dd'
    });
    
     $("#destino").autocomplete({
                    source: "../model/buscador.php",
                    minLength: 3
                });
                
    $('#viatura').change(function(){
            $('#motorista').load('../model/listaMotoristas.php?viatura='+$('#viatura').val());
        });
});
