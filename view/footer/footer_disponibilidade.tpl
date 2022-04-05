<script src="/libs/js/script.js" type="text/javascript"></script>
<script src="/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="/libs/js/select2.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.detalhes').DataTable({
            fixedHeader: {
                header: true,
                headerOffset: 50
            },
            columnDefs: [
                { type: 'date-euro', targets: [3, 5] }
            ],
            "order": [[ 3, "desc" ]],
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
        $('#detalhes').DataTable({
            fixedHeader: {
                header: true,
                headerOffset: 50
            },
            "info": false,
            "paging": false,
            "searching": false,
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

    jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-euro-pre": function ( a ) {
        var x;

        if ( $.trim(a) !== '' ) {
            var frDatea = $.trim(a).split(' ');
            var frTimea = (undefined != frDatea[1]) ? frDatea[1].split(':') : [00,00,00];
            var frDatea2 = frDatea[0].split('/');
            x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1] + ((undefined != frTimea[2]) ? frTimea[2] : 0)) * 1;
        }
        else {
            x = Infinity;
        }

        return x;
    },

    "date-euro-asc": function ( a, b ) {
        return a - b;
    },

    "date-euro-desc": function ( a, b ) {
        return b - a;
    }
} );
</script>
</body>
</html>