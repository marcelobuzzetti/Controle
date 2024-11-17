<?php
include $_SERVER['DOCUMENT_ROOT'] . '/env.php';

class Conexao {
    private static $instance = null;
    private $pdo;

    public function __construct() {
        global $variables;
        $host = $variables['DB_HOST'];
        $db = $variables['DB_DATABASE'];
        $user = $variables['DB_USERNAME'];
        $password = $variables['DB_PASSWORD'];
        $dsn = "mysql:host=$host;dbname=$db";
        try{
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->pdo->prepare("SET NAMES 'utf8'");
            $stmt->execute();
            $stmt = $this->pdo->prepare('SET character_set_connection=utf8');
            $stmt->execute();
            $stmt = $this->pdo->prepare('SET character_set_client=utf8');
            $stmt->execute();
            $stmt = $this->pdo->prepare('SET character_set_results=utf8');
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function getConexao() {
        return $this->pdo;
    }
}