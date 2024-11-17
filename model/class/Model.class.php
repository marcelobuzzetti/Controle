<?php

class Model extends Conexao {
    protected $pdo;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance()->getConexao();
    }
}