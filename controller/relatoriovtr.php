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
        $smarty->assign('titulo','Relatório de Utilizaçao de Vtr por Periodo');
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('relatoriovtr.tpl');    
        $smarty->display('./footer/footer.tpl');
        
        } else {
        
        $verificador = 1;
        $data_inicio = date('Y-m-d',strtotime(str_replace('/', '-', $_POST['data-inicio'])));
        $data_fim = date('Y-m-d',strtotime(str_replace('/', '-', $_POST['data_fim'])));

        
        $relatorios = new Relatorio();
        $relacao_relatorio = $relatorios->listarVtrUtilizacao($data_inicio, $data_fim);
        foreach ($relacao_relatorio as $value) {
        $a .= '"'.$value['modelo'].'-'.$value['placa'].'"'.',';
        }
        foreach ($relacao_relatorio as $value) {
        $b .= $value['qnt'].',';
        }
         foreach ($relacao_relatorio as $value) {
        $c .= $value['KM'].',';
        }
        
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        
        $smarty->assign('verificador',$verificador);
        $smarty->assign('titulo','Relatório de Utilizaçao de Vtr por Periodo de '.$data_inicio.' a '.$data_fim);
        $smarty->assign('a',$a);
        $smarty->assign('b',$b);
        $smarty->assign('c',$c);
        $smarty->assign('login', $_SESSION['login']);
        $smarty->display('./headers/header.tpl');
        $smarty->display($menu);
        $smarty->display('relatoriovtr.tpl');
        $smarty->display('./footer/footer.tpl');
        
    }
}
?>