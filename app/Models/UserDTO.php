<?php

/**
 * Classe usuarioDTO
 * Esta classe representa um Data Transfer Object (DTO) para a entidade usuário.
 * Ela contém propriedades privadas para representar os atributos de um usuário
 * e métodos públicos para acessar e modificar esses atributos.
 */
class usuarioDTO {

    // Propriedades privadas que representam os atributos de um usuário
    private $idusuario;
    private $nome; # Nome do usuario
    private $usuario; # username do usuario 
    private $email;
    private $senha;

    // Métodos GET para recuperar os valores das propriedades

    /**
     * Retorna o ID do usuário.
     * @return int O ID do usuário.
     */
    function getIdusuario() {
        return $this->idusuario;
    }

    /**
     * Retorna o nome do usuário.
     * @return string O nome do usuário.
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Retorna o nome de usuário.
     * @return string O nome de usuário.
     */
    function getUsuario() {
        return $this->usuario;
    }

    /**
     * Retorna o email do usuário.
     * @return string O email do usuário.
     */
    function getEmail(){
        return $this->email;
    }

    /**
     * Retorna a senha do usuário.
     * @return string A senha do usuário.
     */
    function getSenha() {
        return $this->senha;
    }

    // Métodos SET para definir os valores das propriedades

    /**
     * Define o ID do usuário.
     * @param int $idusuario O ID do usuário.
     */
    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    /**
     * Define o nome do usuário.
     * @param string $usuario O nome do usuário.
     */
    function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Define o nome de usuário.
     * @param string $usuario O nome de usuário.
     */
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Define o email do usuário.
     * @param string $email O email do usuário.
     */
    function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Define a senha do usuário.
     * @param string $senha A senha do usuário.
     */
    function setSenha($senha) {
        $this->senha = $senha;
    }
}
