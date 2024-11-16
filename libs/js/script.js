/*Remove atributo required em percurso*/
function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}
/*Remove atributo required em percurso*/

/*Remove atributo disabled em class disabled*/
function removerDisabled() {
    $(".disabled").removeProp('disabled');
}
/*Remove atributo disabled em class disabled*/

function atualizarUsuario() {
    $senha_antiga = $('#senha_antiga').val();
    $id = $('#id').val();
    $senha_nova = $('#senha_nova').val();
    $senha = $('#senha').val();
    $login = $('#login').val();
    $apelido = $('#apelido').val();
    var i = 0;

    if ($senha_antiga == "") {
        i++;
    }
    if ($senha_nova == "") {
        i++;
    }
    if ($senha == "") {
        i++;
    }
    if ($login == "") {
        i++;
    }
    if ($apelido == "") {
        i++;
    }
    if ($senha_nova != $senha) {
        alert("As senhas não conferem");
        i++;
    }

    if (i != 0) {
        alert("Preencha todos os campos");
        return false;
        i = 0;
    }
    $.ajax({
        type: 'POST',
        url: '../model/executar.php',
        async: true,
        data: {id: $id, senha_antiga: $senha_antiga, enviar: 'verificar_senha'},
        error: function (request, status, error) {
            alert("O sistema está indisponível no momemto, tente mais tarde");
            return false;
        },
        success: function (result) {
            if (result == 1) {
                $.ajax({
                    type: 'POST',
                    url: '../model/executar.php',
                    async: true,
                    data: {id: $id, login: $login, apelido: $apelido, senha: $senha, enviar: 'alterar_usuario'},
                    error: function (request, status, error) {
                        // Aqui você trata um erro que possa vir a ocorrer
                        // Exemplo:
                        alert("O sistema está indisponível no momemto, tente mais tarde");
                    },
                    success: function () {
                        alert("Entre com o novo usuário e senha");
                        document.location.href = '/logout';
                    }
                });
            } else {
                alert("A senha antiga nao confere");
            }
        }
    });
}



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
    /*Cadastro Rápido e Completo*/

    $('.cadastrocompleto').click(function () {
        $('.cadastro').show();
        $('.rapido').hide();
        $('.cadastrocompleto').addClass('btn-danger');
        $('.cadastrorapido').removeClass('btn-danger');
        /*$(".cadastro .form-control").prop('required','required');
         $(".rapido .form-control").prop('required',null);*/
    });

    $('.cadastrorapido').click(function () {
        $('.rapido').show();
        $('.cadastro').hide();
        $('.cadastrorapido').addClass('btn-danger');
        $('.cadastrocompleto').removeClass('btn-danger');
        /* $(".cadastro .form-control").prop('required',null);
         $(".rapido .form-control").prop('required','required');*/
    });
    /*Cadastro Rápido e Completo*/

    /*Remoção de Telefones*/
    $('.telefone').click(function () {
        $(this).parent('#telefones')
                .off('click')
                .hide(function () {
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
                            //$('#alerta_telefone').html("<div>Telefone removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Remoção de Telefones*/
    /*Ativação de Telefones*/
    $('.ativartelefone').click(function () {
        $(this).parent('#telefones')
                .off('click')
                .hide(function () {
                    $this = $(this);
                    $id = $this.children("#id_telefones").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'ativar_telefone'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível ativar o telefone');
                        },
                        success: function (data, textStatus, jqXHR) {
                            //$('#alerta_telefone').html("<div>Telefone removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Ativação de Telefones*/

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
                            //$('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Remoção Email*/
    /*Ativação Email*/
    $('.ativaremail').click(function () {
        $(this).parent('#emails')
                .off('click')
                .hide('slow', function () {
                    $this = $(this);
                    $id = $this.children("#id_emails").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'ativar_email'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível ativar o email');
                        },
                        success: function (data, textStatus, jqXHR) {
                            //$('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Ativação Email*/

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
                            alert('Não foi possível apagar o emdereço');
                        },
                        success: function (data, textStatus, jqXHR) {
                            //$('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Remoção Endereço*/
    /*Ativar Endereço*/
    $('.ativarendereco').click(function () {
        $(this).parent('#enderecos')
                .off('click')
                .hide('slow', function () {
                    $this = $(this);
                    $id = $this.children("#id_enderecos").val();
                    $.ajax({
                        type: 'POST',
                        url: '../model/executar.php',
                        async: true,
                        data: {id: $id, enviar: 'ativar_endereco'},
                        error: function (request, status, error) {
                            // Aqui você trata um erro que possa vir a ocorrer
                            // Exemplo:
                            alert('Não foi possível ativar o endereço');
                        },
                        success: function (data, textStatus, jqXHR) {
                            //$('#alerta_telefone').html("<div>E-mail removido</div>").addClass('alert alert-success alert-dismissible col-xs-12 col-sm-12 col-md-12').attr('data-dismiss', 'alert').hide(10000);
                            $(this).remove();
                        }
                    });
                });
    });
    /*Ativar Endereço*/


    /*Adicionado campos*/
    $("#outro").click(function () {
        $endereco = "<div id='enderecos'><div class='form-group col-xs-12 col-sm-6 col-md-2'><label for='rua'>Tipo</label><input class='form-control' type='text' id='tipo_endereco' name='tipo_endereco[]' placeholder='Tipo'  maxlength='20'/></div><div class='form-group col-xs-12 col-sm-6 col-md-6'><label for='rua'>Rua</label><input class='form-control' type='text' id='rua' name='rua[]' placeholder='Rua e Número' /></div><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='bairro'>Bairro</label><input class='form-control' type='text' id='bairro' name='bairro[]' placeholder='Bairro'/></div><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='complemento'>Complemento</label><input class='form-control' type='text' id='complemento' name='complemento[]' placeholder='Complemento'/></div><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='estado'>Estado</label><input class='form-control' type='text' id='estado' name='estado[]' placeholder='Estado'  maxlength='2'/></div><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='cidade'>Cidade</label><input class='form-control' type='text' id='cidade' name='cidade[]' placeholder='Cidade'/></div></div>";
        $($endereco).appendTo("#outro_endereco").find('input').val('');
        $('input').attr('tabindex', function (index, attr) {
            return index + 1;
        });

    });

    $("#outros_telefones").click(function () {
        $telefone = "<div id='telefones' class='telefones'><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='tipo_telefone'>Tipo</label><input class='form-control' type='text' id='tipo_telefone' name='tipo_telefone[]' placeholder='Tipo'/></div><div class='form-group col-xs-12 col-sm-6 col-md-6'><label for='telefone'>Telefone</label><input class='form-control' type='text' id='telefone' name='telefone[]' placeholder='Telefone'/></div></div>";
        $($telefone).appendTo("#outro_telefone").find('input').val('');
    });

    $("#outros_emails").click(function () {
        $email = "<div id='emails'><div class='form-group col-xs-12 col-sm-6 col-md-4'><label for='email'>E-mail</label><input class='form-control' type='text' id='email' name='email[]' placeholder='E-mail'/></div></div>";
        $($email).appendTo("#outro_email").find('input').val('');
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

    $('#data_nascimento').datepicker({
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

    $('#data_ind').datepicker({
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

    /*Completa cidades*/
    $('#estado_natal').change(function () {
        $('#cidade_natal').load('/buscacidades?estado=' + $('#estado_natal').val());
    });
    $('.estado1').change(function () {
        $('.cidade1').load('/buscacidades?estado=' + $('.estado1').val());
    });
    /*Completa cidades*/

    /*Autocompleta o destino em percurso*/
    $("#destino").autocomplete({
        source: "../model/buscador.php",
        minLength: 1
    });
    /*Autocompleta o destino em percurso*/

    /*Autocompleta o destino em percurso*/
    $("#desc").autocomplete({
        source: "../model/buscador_abastecimento.php",
        minLength: 1
    });
    /*Autocompleta o destino em percurso*/

    /*Completa o motorista e o odometro em percurso*/
    $('#viatura').change(function () {
        $('#motorista').load('../model/listaMotoristas.php?viatura=' + $('#viatura').val() + '&token=' + $('input#csrf').val());
        $('#odo_saida').load('../model/odometro.php?viatura=' + $('#viatura').val() + '&token=' + $('input#csrf').val());
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

    /*Verifica se o login existe*/
    $('.login').keyup(function () {
        $('.login').load('../model/verificaLogin.php?' + $.param({login: $('#login').val()}));
    });
    /*Verifica se o login existe*/

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
    /*$("#placa").mask("ZZZ0000", {
        translation: {
            'Z': {
                pattern: /[A-Za-z]/, optional: false
            }
        }
    });*/
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
        var categoria = button.data("categoria")
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
        modal.find('.nome input').val(nome)
        modal.find('.sigla input').val(sigla)
        modal.find('.categoria input').val(categoria)
    });
    /*Modal dos motoristas*/
    /*Modal do percurso*/
    $('#modalpercurso').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var destino = button.data("destino")
        var nome = button.data("nome")
        var viatura = button.data("vtr")
        var modal = $(this)
        modal.find('.modal-footer input.1').val(recipient)
        modal.find('.nome input').val(nome)
        modal.find('.destino input').val(destino)
        modal.find('.vtr input').val(viatura)
    });
    /*Modal do percurso*/
    /*Modal dos abastecimentos*/
    $('#exampleModalespecial').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
    });
    /*Modal dos abastecimentos*/

    /*Mostra Painel Disponibilidade
    $('#situacao').change(function () {
        if($('#situacao').val() == 2){
            $("#indisponibilidade").show();
            $("#motivo").attr('required','required');
            $("#data").attr('required','required');

        } else {
            $("#indisponibilidade").hide();
            $("#motivo").removeAttr('required');
            $("#data").removeAttr('required');
        }
    });
    /*Mostra Painel Disponibilidade*/
});



