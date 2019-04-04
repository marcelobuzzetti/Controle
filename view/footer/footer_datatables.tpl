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
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        let id = [];
        const socket = io('{$HOST}:3000', { transports: ['websocket'] }); 

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
            console.log(data);
            $("#viatura_abastecimento").val(data.rfid).change();
            if ($("#viatura_abastecimento").val() == data.rfid) {
                $("#viatura_abastecimento").attr('readonly','readonly');
                $("#nrvale").focus();
                } else {
                    alert('Viatura Inexistente');
                    window.location.reload();
                }

        });
    </script>
</body>
</html>