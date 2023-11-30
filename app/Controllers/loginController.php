<?php
session_start(); // Inicia a sessão para armazenar informações do usuário logado

require_once '../Models/loginDAO.php'; // Inclui o arquivo que contém a lógica do acesso ao banco de dados para login

// Verifica se as variáveis de email e senha foram enviadas através do método POST
if (isset($_POST["email"], $_POST["senha"])) {
    $email = $_POST["email"]; // Obtém o email enviado pelo formulário de login
    $senha = md5($_POST["senha"]); // Obtém a senha enviada pelo formulário de login e aplica o hash MD5 (atenção: o uso de MD5 para senha não é recomendado atualmente devido a suas vulnerabilidades conhecidas)

    $loginDAO = new LoginDAO(); // Cria uma instância do objeto LoginDAO para interagir com o banco de dados

    // Chama o método login da classe LoginDAO para verificar as credenciais do usuário
    $usuario = $loginDAO->login($email, $senha);

    // Se as credenciais estiverem corretas e um usuário for retornado do banco de dados
    if (!empty($usuario)) {
        // Armazena informações do usuário na sessão para manter o login
        $_SESSION["nome"] = $usuario["nome"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["idusuario"] = $usuario["idusuario"];

        // Redireciona para a página de boas-vindas após o login bem-sucedido
        header("Location: ../Views/bemvindo.php");
        exit(); // Termina o script após o redirecionamento
    } else {
        // Se as credenciais estiverem incorretas, exibe um alerta via JavaScript e redireciona de volta para a página de login
        echo "<script>alert('Senha ou email incorretos');</script>";
        header("Location: ../Views/login.php");
        exit(); // Termina o script após o redirecionamento
    }
} else {
    // Se as informações de login não forem recebidas via POST, exibe uma mensagem indicando a ausência de informações
    echo "Informações do formulário ausentes.";
}
?>
