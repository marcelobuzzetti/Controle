<script src="/libs/js/jquery.min.js" type="text/javascript"></script>
<script src="/libs/js/script.js" type="text/javascript"></script>
<script src="/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/libs/js/jquery.mask.js" type="text/javascript"></script>
<script src="/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script src="/libs/js/bootstrap-tokenfield.min.js" type="text/javascript"></script>
<script src="/libs/js/select2.min.js" type="text/javascript"></script>
<script>

    $('.js-example-responsive').select2();

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
                source: "/buscadormilitar",
                minLength: 3
            },
            showAutocompleteOnFocus: true
        })
    });
</script>
</body>
</html>