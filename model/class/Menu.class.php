<?php

class Menu {

    public function SelecionarMenu($perfil) {
        switch ($perfil) {
            case 1:
                return './menus/menuAdmin.tpl';
                break;
            case 2:
                return './menus/menuOperador.tpl';
                break;
            case 3:
                return './menus/menuMntGaragem.tpl';
                break;
            case 4:
                return './menus/menuMntS4.tpl';
                break;
            case 5:
                return './menus/menuRp.tpl';
                break;
            default:
                return './menus/menuLogin.tpl';
        }
    }

}
