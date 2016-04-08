<?php
include '../include/config.inc.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: '.  constant("HOST").'/percurso');
} else {
     
    $verificador = 0;
    
    $menus = new Menu();
    $menu = $menus->SelecionarMenu($_SESSION['perfil']);
    
    if(!isset($_POST['data_inicio'])){
        
        $smarty->assign('verificador',$verificador);
        $smarty->assign('titulo','Relatórios');
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('relatorio.tpl');    
        $smarty->display('./footer/footer.tpl');
        
        } else {
        
        $verificador = 1;
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        
        $relatorios = new Relatorio();
        $relacao_relatorio = $relatorios->listarPercursos($data_inicio, $data_fim);
        
        $data_inicio = date('d/m/Y',strtotime($data_inicio));
        $data_fim = date('d/m/Y',strtotime($data_fim));
        
        $smarty->assign('verificador',$verificador);
        $smarty->assign('titulo','Relatórios de '.$data_inicio.' a '.$data_fim);
        $smarty->assign('relacao_relatorio',$relacao_relatorio);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('relatorio.tpl');
        $smarty->display('./footer/footer.tpl');
        
    }
}
?>