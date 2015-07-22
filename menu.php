<?php
    $endereco = $_SERVER['SERVERNAME'].'/controle';
    
    if($_SESSION['perfil'] == 1){

?>
<ul id="nav" class="nav nav-tabs">
    <li><a href="<?php echo $endereco ?>/percurso/index.php">Cadastrar Percursos</a></li>            
    <li><a href="<?php echo $endereco ?>/motorista/index.php">Cadastrar Motorista</a></li>
    <li><a href="<?php echo $endereco ?>/viatura/index.php">Cadastrar Viatura</a></li>
    <li><a href="<?php echo $endereco ?>/usuario/cadastrar_usuario.php">Cadastrar Usuário</a></li>
    <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
    <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
</ul>


<?php
    }else{
?>        
        <ul id="nav" class="nav nav-tabs">
            <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
            <li><a href="<?php echo $endereco ?>/usuario/logout.php">Logout</a></li>
        </ul>  
<?php
    }
?>