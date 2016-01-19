function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}

function imprimir() {
    self.print();
}

$(function () {
    $('#data').datepicker({
            showButtonPanel:true,
            dateFormat: 'yy-mm-dd',
        });
    
     $("#destino").autocomplete({
                    source: "../model/buscador.php",
                    minLength: 3
                });
                
    $('#viatura').change(function(){
        $('.Selecione').hide();
        $('#motorista').load('../model/listaMotoristas.php?viatura='+$('#viatura').val());
        });
});
