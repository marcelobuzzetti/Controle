<HTML>
    <HEAD>
        <TITLE>Controle de Entrada e Saída de Viaturas</TITLE>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../libs/js/jquery.js"></script>
        <link href="../libs/css/bootstrap.css" rel="stylesheet">
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/script.js"></script>
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/jquery-ui.js"></script>
        <script src="../libs/js/script.js"></script>

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