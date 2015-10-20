<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
        <script src="js/script.js"></script>
        <title>Sistema</title>
    </head>
    <body> 
        <form class="form-inline" action="executar.php" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input autofocus type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
            </div>
            <button type="submit" value="login" name="enviar" class="btn btn-default">Login</button>
        </form>  
          <table class='table'>
                 <caption>Viaturas Rodando</caption>
                    <tr>
                        <td>Viatura</td>
                        <td>Motorista</td>
                        <td>Destino</td>
                        <td>Odômetro Saída</td>
                        <td>Ch Vtr</td>
                        <td>Data Saída</td>
                        <td>Hora Saída</td>
                    </tr>
               {foreach $tabela_relacao_vtr as $vtr}
                    <tr>
                        <td>{$vtr.viatura}</td>
                        <td>{$vtr.apelido}</td>
                        <td>{$vtr.destino}</td>
                        <td>{$vtr.odo_saida}</td>
                        <td>{$vtr.ch_vtr}</td>
                        <td>{$vtr.data_saida}</td>
                        <td>{$vtr.hora_saida}</td>
                    </tr>
                {/foreach}    
         </table>  
    </body>
</html>