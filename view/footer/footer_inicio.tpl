<script src="/libs/js/script.js" type="text/javascript"></script>
<script src="/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="/libs/js/jszip.min.js" type="text/javascript"></script>
<script src="/libs/js/pdfmake.min.js" type="text/javascript"></script>
<script src="/libs/js/vfs_fonts.js" type="text/javascript"></script>
<script src="/libs/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="/libs/js/select2.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        /*$('#tabela').DataTable({
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
        });*/

       var table = $('#ajax').DataTable( {
           ajax: {
               url: '/api/viaturasrodando.php',
               dataSrc: '',
                error: function (xhr, error, code)
                {
                    console.log(xhr);
                    console.log(error);
                    console.log(code);
                }  
               },
            columns: [ 
                { data: 'viatura' },
                { data: 'apelido' },
                { data: 'nome_destino' },
                { data: 'odo_saida' },
                { data: 'acompanhante' },
                { data: 'data_saida' } 
                ],
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

         setInterval( function () {
            table.ajax.reload( null, false ); // user paging is not reset on reload
            table.order( [[ 5, 'desc' ]] ).draw( false );
        }, 60000 );
         
        $('#refresh').click(function() {
            table.ajax.reload( null, false ); // user paging is not reset on reload
            table.order( [[ 5, 'desc' ]] ).draw( false );
        });
    });
</script>
</body>
</html>