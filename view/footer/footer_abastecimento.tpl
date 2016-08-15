<div class="container">
    <div class="row">
        <div id="social-icons">
            <a target="_blank" href="https://twitter.com/marcelobuzzetti" title="Twitter" ><img src="{$HOST}/libs/imagens/social_icons/twitter.png"></a>
            <a target="_blank" href="https://plus.google.com/u/0/118309322821221542062" title="G+" ><img src="{$HOST}/libs/imagens/social_icons/google.png"></a>
            <a target="_blank" href="https://br.linkedin.com/in/marcelo-buzzetti-08a4a185" title="Linkedin" ><img src="{$HOST}/libs/imagens/social_icons/linkedin.png"></a>
            <a target="_blank" href="https://github.com/marcelobuzzetti" title="Linkedin" ><img src="{$HOST}/libs/imagens/social_icons/GitHub-Mark.png"></a>
        </div> <!-- Aqui e a area das redes sociais -->
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</div>
<script src="{$HOST}/libs/js/jquery.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/script.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="{$HOST}/libs/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#abastecimento').DataTable({
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
</body>
</html>