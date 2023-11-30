<?php

require_once '../../config/database.php'; // Inclui o arquivo de conexão

// Início da classe UsuarioDAO
class UsuarioDAO
{

    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }

    // INSERT
    public function salvar(UsuarioDTO $usuarioDTO)
    {
        try {
            $sql = "INSERT INTO user (usuario, senha, email, nome)
 VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getUsuario());
            $stmt->bindValue(2, $usuarioDTO->getSenha());
            $stmt->bindValue(3, $usuarioDTO->getEmail());
            $stmt->bindValue(4, $usuarioDTO->getNome());
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    // SELECT TODOS
    public function selecionaTds()
    {
        try {
            $sql = "SELECT * FROM user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //SELECT UNICO
    public function selecionaID($idusuario)
    {
        try {
            $sql = "SELECT * FROM user where idusuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //DELETE
    public function excluir($idusuario)
    {
        try {
            $sql = "DELETE FROM user where idusuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
