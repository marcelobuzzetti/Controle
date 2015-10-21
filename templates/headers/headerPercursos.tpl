<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <script src="../lib/js/jquery.js"></script>
        <link href="../lib/css/bootstrap.css" rel="stylesheet">
        <script src="../lib/js/bootstrap.js"></script>
        <script src="../lib/js/script.js"></script>
        <script src="../lib/js/jquery.js"></script>
        <script src="../lib/js/jquery-ui.js"></script>
        <script src="../lib/js/script.js"></script>

        <script>
            $(function () {
                $("#destino").autocomplete({
                    source: "../configs/buscador.php",
                    minLength: 3
                });
            });
        </script>

    </HEAD>
    <body>