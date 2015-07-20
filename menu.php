<?php
    
    if($_SESSION['perfil'] == 1){

?>
<ul id="nav" class="nav nav-tabs">
    <li><a href="../percurso/index.php">Cadastrar Percursos</a></li>            
    <li><a href="../motorista/index.php">Cadastrar Motorista</a></li>
    <li><a href="../viatura/index.php">Cadastrar Viatura</a></li>
    <li><a href="../usuario/cadastrar_usuario.php">Cadastrar Usuário</a></li>
    <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
    <li><a href="../usuario/logout.php">Logout</a></li>
</ul>


<?php
    }else{
?>        
        <ul id="nav" class="nav nav-tabs">
            <li><a>Olá <?php echo $_SESSION['login'];?></a></li>
            <li><a href="../usuario/logout.php">Logout</a></li>
        </ul>  
<?php
    }
?>