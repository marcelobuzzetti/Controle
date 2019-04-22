<script src="{$HOST}/libs/js/script.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/select2.min.js" type="text/javascript"></script>
<script>
    $('.js-example-responsive').select2();
    $(document).ready(function () {
        $('.table').DataTable({
            fixedHeader: {
                header: true,
                headerOffset: 50
            },
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sSearch": "",
                "sProcessing": "Aguarde enquanto os dados são carregados ...",
                "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                "sInfoFiltered": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            }
        });
    });
</script>
<script src="{$HOST}:3000/socket.io/socket.io.js"></script>
    <script>
        let id = [];
        const socket = io('{$HOST}:3000',  { transports: ['websocket'] });

        $('#rfid').change( function(){
            if($('#rfid').val().length == 10) {
                socket.emit(
                        'msgParaServidor',
                        {
                            rfid: $('#rfid').val(), 
                        }
                    );
                $('#rfid').attr('disabled','disabled');  
            }
        });

        socket.on('msgParaCliente', function(data){
            if(data.rfid === 0){ 
                alert('Viatura não cadastrada');
                $('#rfid').removeAttr('disabled').val('').focus(); 
                $('#rfid').focus(); 
            } else {
                if($("#viatura_abastecimento option[value="+data.rfid+"]").length != 0){
                    $("#viatura_abastecimento").val(data.rfid).change();
                    $("#viatura_abastecimento").attr('readonly','readonly');
                } else {
                    $('#rfid').removeAttr('disabled').val('');  
                    switch($(".tabela").css("display")){
                            case "none":
                                if ($("#"+data.rfid+"").attr('id') == data.rfid) {
                                    $("#"+data.rfid+"").focus();
                                } else {
                                    alert('Viatura rodando ou Inexistente');
                                    window.location.reload();
                                }
                            break;
                            case "block":
                                if ($("#"+data.rfid+"_").attr('id') == (data.rfid+"_")) {
                                    $("#"+data.rfid+"_").focus();
                                } else {
                                    alert('Viatura rodando ou Inexistente');
                                    window.location.reload();
                                }
                            break;
                        }
                }
            }
        });
    </script>
</body>
</html>