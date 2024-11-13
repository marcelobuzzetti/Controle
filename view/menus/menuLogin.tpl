<div class='container'>
    {if !empty($erro) && $erro != null}
    <script>toastr.error('{$erro}');</script>
        </div>              
    {/if}
</div>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/percurso">Controle</a>
            <a class="navbar-brand" href="/percurso_guarda">Anotar Vtr Saindo?</a>
        </div>
        <div class='container'>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-collapse" action="/executar" method="post">
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
            </div>
            </nav>