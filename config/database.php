<?php

$host = 'seu_host';
$dbname = 'railway'; // No meu exemplo estou usando esse nome no banco de dados, você pode alterar essa informação 
$user = 'seu_user';
$password = 'sua_senha';
$port = 'sua_porta'; // Por padrão é a 3306

abstract class Conexao {

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance() {
        global $host, $dbname, $user, $password, $port;
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=UTF8", $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        } catch (PDOException $exc) {
            echo "Erro ao conectar o banco de dados :" . $exc->getMessage();
            return null;
        }
    }
}
