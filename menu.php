<?php
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    
    if($_SESSION['perfil'] == 1){

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
    </ul>
    </li>
    <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
    <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
</ul>


<?php
    }else{
?>        
        <ul id="nav" class="nav nav-pills">
            <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
            <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
        </ul>  
<?php
    }
?>