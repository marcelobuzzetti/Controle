<script src="{$HOST}/libs/js/script.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jszip.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/pdfmake.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/vfs_fonts.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/select2.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
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
        const socket = io('{$HOST}:3000', { transports: ['websocket'] }); 

        socket.on('viaturasRodando', function(data){
            let a = "";
            if(typeof(data.dados) !== 'undefined'){
                if(data.dados.length > 0){
                    $(".teste").remove();
                    $("tbody tr").remove();
                    for (i in data.dados){
                        a += "<tr class='teste'><td>"+data.dados[i].marca+" - "+data.dados[i].modelo+" - "+data.dados[i].placa+"</td>";
                        a +=  "<td>"+data.dados[i].apelido+"</td>";
                        a += "<td>"+data.dados[i].nome_destino+"</td>";
                        a += "<td>"+data.dados[i].odo_saida+"</td>";
                        a += "<td>"+data.dados[i].acompanhante+"</td>";
                        a += "<td>"+data.dados[i].data_saida+" - "+data.dados[i].hora_saida+"</td></tr>";
                    }
                } else {
                    $(".teste").remove();
                    $("tbody tr").remove();
                    if(typeof(data.dados.marca) !== 'undefined'){
                        a += "<tr class='teste'><td>"+data.dados.marca+" - "+data.dados.modelo+" - "+data.dados.placa+"</td>";
                        a +=  "<td>"+data.dados.apelido+"</td>";
                        a += "<td>"+data.dados.nome_destino+"</td>";
                        a += "<td>"+data.dados.odo_saida+"</td>";
                        a += "<td>"+data.dados.acompanhante+"</td>";
                        a += "<td>"+data.dados.data_saida+" - "+data.dados.hora_saida+"</td></tr>";
                    }
                }
            } else {
                $(".teste").remove();
                $("tbody tr").remove();
                a = "<tr class='teste'><td valign='top' colspan='6' class='dataTables_empty'>Nenhum registro encontrado</td></tr>";
            }
            $("#tabela").append(a);
        });
    </script>
</body>
</html>