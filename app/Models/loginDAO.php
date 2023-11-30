<?php

// Incluindo o arquivo de configuração do banco de dados
require_once '../../config/database.php';

// Classe LoginDAO para lidar com a autenticação de usuários
class LoginDAO {
    public $pdo = null; // Objeto PDO para conexão com o banco de dados

    // Método construtor para inicializar a conexão com o banco de dados
    public function __construct() {
        $this->pdo = Conexao::getInstance(); // Obtém uma instância de conexão com o banco de dados
    }

    // Método para realizar o login, recebendo email e senha como parâmetros
    public function login($email, $senha) {
        try {
            // Consulta SQL para buscar um usuário com o email e senha fornecidos
            $sql = "SELECT * FROM user WHERE email = ? AND senha = ?";
            $stmt = $this->pdo->prepare($sql); // Preparação da consulta
            $stmt->bindValue(1, $email); // Vinculação do valor do email
            $stmt->bindValue(2, $senha); // Vinculação do valor da senha
            $stmt->execute(); // Execução da consulta
            $login = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém os resultados da consulta como um array associativo
            return $login; // Retorna os dados do usuário (se encontrado)
        } catch (PDOException $exc) {
            // Em caso de erro, lança uma exceção com a mensagem de erro
            throw new Exception($exc->getMessage());
        }
    }
}

?>
