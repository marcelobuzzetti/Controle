<?php
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    
    include 'verificarLogin.php';
    switch ($_SESSION['perfil']) {
    case 1:

?>
<ul id="nav" class="nav nav-pills">
    <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Controle de Viaturas <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo $endereco ?>/percurso/index.php">Cadastrar Saída de Viatura</a></li>
        <li><a href="<?php echo $endereco ?>/motorista/index.php">Cadastrar Motorista</a></li>
        <li><a href="<?php echo $endereco ?>/viatura/index.php">Cadastrar Viatura</a></li>
        <li><a href="<?php echo $endereco ?>/usuario/cadastrar_usuario.php">Cadastrar Usuário</a></li>
        <li><a href="<?php echo $endereco ?>/tabela/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
         <li><a href="<?php echo $endereco ?>/tabela/index.php" >Relatório por Data</a></li>
    </ul>
    </li>
    <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
    <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
</ul>


<?php
    break;
    case 2:
?>        
        <ul id="nav" class="nav nav-pills">
            <li><a href="<?php echo $endereco ?>/tabela/tabela_relacao_vtr.php" target="_blank">Relatório do Sv</a></li>
            <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
            <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
        </ul>  
<?php
    break;
    case 3:
?>
        <ul id="nav" class="nav nav-pills">
    <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Cadastros <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo $endereco ?>/motorista/index.php">Cadastrar Motorista</a></li>
        <li><a href="<?php echo $endereco ?>/viatura/index.php">Cadastrar Viatura</a></li>
        <li><a href="<?php echo $endereco ?>/tabela/index.php" >Relatório por Data</a></li>
    </ul>
    </li>
    <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
    <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
</ul>
<?php
break;
default:
    
    }
?>