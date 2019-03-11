<script src="{$HOST}/libs/js/jquery.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/script.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/bootstrap-tokenfield.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            "info": false,
            "paging": false,
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
        $('#acompanhante').tokenfield({
            autocomplete: {
                source: "../model/buscador_militar.php",
                minLength: 3
            },
            showAutocompleteOnFocus: true
        })
    });
</script>
 <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        let id = [];
        const socket = io('http://localhost:3000');

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
            $("#viatura").val(data.rfid).change();
            if ($("#viatura").val() == data.rfid) {
                $("#viatura").attr('readonly','readonly');
                } else {
                    alert('Viatura rodando ou Inexistente');
                    window.location.reload();
                }

        });
    </script>
</body>
</html>