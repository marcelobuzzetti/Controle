/*Remove atributo required em percurso*/
function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}
/*Remove atributo required em percurso*/

/*Abrir Select com o passar do mouse
 $(function start(){
 $('select').hover(function () {
 start();
 var count = $(this).children().length;
 $(this).attr('size', count);
 }, function () {
 $(this).removeAttr('size');
 });
 $('option').mouseenter(function () {
 $(this).attr('style', 'background-color:#0166FD;color:white');
 });
 $('option').mouseleave(function () {
 $(this).removeAttr('style');
 });
 });
 Abrir Select*/

$(function () {

    /*Remoção de Telefones*/
    $('.telefone').click(function () {
        $(this).parent('#telefones')
                .off('click')
                .hide('slow', function () {
                    $this = $(this);
                    $id = $this.children("#id_telefones").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'apagar_telefone'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível apagar o telefone');
                        },
                        success: function (data, textStatus, jqXHR) {
                            $('#alerta_telefone').html("<div>Telefone removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                        }
                    });
                    $(this).remove();
                });
    });
    /*Remoção de Telefones*/
   
    /*Remoção Email*/
     $('.email').click(function () {
        $(this).parent('#emails')
                .off('click')
                .hide('slow', function () {
                    $this = $(this);
                    $id = $this.children("#id_emails").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'apagar_email'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível apagar o email');
                        },
                        success: function (data, textStatus, jqXHR) {
                            $('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                        }
                    });
                    $(this).remove();
                });
    });
    /*Remoção Email*/
    
     /*Remoção Endereço*/
     $('.endereco').click(function () {
        $(this).parent('#enderecos')
                .off('click')
                .hide('slow', function () {
                    $this = $(this);
                    $id = $this.children("#id_enderecos").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'apagar_endereco'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível apagar o email');
                        },
                        success: function (data, textStatus, jqXHR) {
                            $('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                        }
                    });
                    $(this).remove();
                });
    });
    /*Remoção Endereço*/

    /*Adicionado campos*/
    $("#outro").click(function () {
        $("#endereco").clone().appendTo("#outro_endereco").find('input').val('');
        $('input').attr('tabindex', function (index, attr) {
            return index + 1;
        });

    });

    $("#outros_telefones").click(function () {
        $("#telefones").clone().appendTo("#outro_telefone").find('input').val('');
    });

    $("#outros_emails").click(function () {
        $("#emails").clone().appendTo("#outro_email").find('input').val('');
    });
    /*Adicionado campos*/



    /*Ocultar alertas automaticamente*/
    $('.alert').hide(10000);
    /*Ocultar alertas automaticamente*/

    /*Coloca datepicker nas datas*/
    $('#data').datepicker({
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
        minLength: 1
    });
    /*Autocompleta o destino em percurso*/

    /*Completa o motorista e o odometro em percurso*/
    $('#viatura').change(function () {
        $('#motorista').load('../model/listaMotoristas.php?viatura=' + $('#viatura').val());
        $('#odo_saida').load('../model/odometro.php?viatura=' + $('#viatura').val());
    });
    $('#viatura_abastecimento').change(function () {
        $('#odometro').load('../model/odometroAbastecimento.php?viatura=' + $('#viatura_abastecimento').val());
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
        $('#alerta').load('../model/verificaModelo.php?' + $.param({marca: $('#marca_modelo').val(), modelo: $('#modelo').val()}));
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

    $('#qnt').change(function () {
        $('#qnt').load('../model/qntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val()}));
        $('#alerta').load('../model/informaQntCombustivel.php?' + $.param({combustivel: $('#combustivel').val(), tp: $('#tp').val(), qnt: $('#qnt').val()}));
    });
    /*Informa a quantidade de combustivel*/

    /*Formatos*/
    $("#data_nascimento").mask("00/00/0000");
    $("#idt_militar").mask("0000000000");
    $(".data").mask("00/00/0000");
    $("#validade").mask("00/00/0000");
    $("#cpf").mask("00000000000");
    $("#cnh").mask("00000000000");
    $("#placa").mask("ZZZ0000", {
        translation: {
            'Z': {
                pattern: /[A-Za-z]/, optional: false
            }
        }
    });
    /*Formatos*/

    /*Verifica se o motorista existe*/
    $('#nome').blur(function () {
        $('#alerta').load('../model/verificaMotorista.php?' + $.param({nome: $('#nome').val(), pg: $('#pg').val()}));
    });
    $('#pg').blur(function () {
        $('#alerta').load('../model/verificaMotorista.php?' + $.param({nome: $('#nome').val(), pg: $('#pg').val()}));
    });
    $('#nome').change(function () {
        $('#alerta').load('../model/verificaMotorista.php?' + $.param({nome: $('#nome').val(), pg: $('#pg').val()}));
    });
    $('#pg').change(function () {
        $('#alerta').load('../model/verificaMotorista.php?' + $.param({nome: $('#nome').val(), pg: $('#pg').val()}));
    });
    $('#nome').keyup(function () {
        $('#alerta').load('../model/verificaMotorista.php?' + $.param({nome: $('#nome').val(), pg: $('#pg').val()}));
    });
    /*Verifica se a motorista existe*/

    /*Verifica se viatura existe*/
    $('#placa').keyup(function () {
        $('#alerta').load('../model/verificaViatura.php?' + $.param({marca: $('#marca').val(), modelo: $('#modelo').val(), placa: $('#placa').val()}));
    });
    /*Verifica se o viatura existe*/

    /*Verifica se combustivel existe*/
    $('#descricao').keyup(function () {
        $('#alerta').load('../model/verificaCombustivel.php?' + $.param({descricao: $('#descricao').val()}));
    });
    /*Verifica se o combustivel existe*/

    /*Verifica se tipo combustivel existe*/
    $('#descricao_tipo').keyup(function () {
        $('#alerta').load('../model/verificaTipoCombustivel.php?' + $.param({descricao: $('#descricao_tipo').val()}));
    });
    /*Verifica se o tipo combustivel existe*/

    /*Utilização AJAX
     $('#teste').click(function () {
     var formdata = $("#form").serialize();
     $.ajax({
     type: 'POST',
     url: '../model/cadastra_viatura.php',
     async: true,
     data: formdata,
     error: function (request, status, error) {
     // Aqui você trata um erro que possa vir a ocorrer
     // Exemplo:
     alert('Não foi possível inserir o modelo');
     }, 
     success: function (data, textStatus, jqXHR) {
     $('#alerta').html('<div>Viatura foi inserida com Sucesso</div>').addClass('alert alert-success alert-dismissible').attr('data-dismiss', 'alert').hide(10000);
     }
     });
     });
     Utilização AJAX*/

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

    /*Cadastro de Motorista junto ao Cadastro de Militares, tornando o campos required*/
    var motorista = 0;
    $('#sim_motorista').click(function () {
        $('.motorista').toggle();
        if (motorista == 0) {
            $('#cnh').attr('required', 'required');
            $('#validade').attr('required', 'required');
            $('#categoria').attr('required', 'required');
            motorista++;
        } else {
            $('#cnh').removeAttr('required');
            $('#validade').removeAttr('required');
            $('#categoria').removeAttr('required')
            motorista--;
        }
    })
    /*Cadastro de Motorista junto ao Cadastro de Militares, tornando o campos required*/

    /*Cadastro de Usuario junto ao Cadastro de Militares, tornando o campos required*/
    var usuario = 0;
    $('#sim_usuario').click(function () {
        $('.usuario').toggle();
        if (usuario == 0) {
            $('#login').attr('required', 'required');
            $('#senha').attr('required', 'required');
            $('#perfil').attr('required', 'required');
            $('#apelido').attr('required', 'required');
            usuario++;
        } else {
            $('#login').removeAttr('required');
            $('#senha').removeAttr('required');
            $('#perfil').removeAttr('required');
            $('#apelido').removeAttr('required');
            usuario--;
        }
    })
    /*Cadastro de Usuario junto ao Cadastro de Militares, tornando o campos required*/

    /*Realiza pesquisa em relatorio*/
    $('#pesquisa_relatorio').keyup(function () {
        $('#relatorio').load('../model/pesquisaRelatorio.php?' + $.param({pesquisa_relatorio: $('#pesquisa_relatorio').val()}));
        $('#relatorio1').load('../model/pesquisaRelatorioResponsivo.php?' + $.param({pesquisa_relatorio: $('#pesquisa_relatorio').val()}));
    });
    /*Realiza pesquisa em relatorio*/

    /*Modal dos motoristas*/
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var sigla = button.data("sigla")
        var nome = button.data("nome")
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
        modal.find('.nome input').val(nome)
        modal.find('.sigla input').val(sigla)
    });
});
/*Modal dos motoristas*/
