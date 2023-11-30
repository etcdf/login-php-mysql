<?php

require_once '../Models/UserDAO.php';
require_once '../Models/UserDTO.php';

if (isset($_POST["nome"], $_POST["email"], $_POST["senha"])) {
    // Verifica se todas as informações foram recebidas do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    // Verifica se algum campo está vazio
    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $usuarioDTO = new usuarioDTO();

        $usuarioDTO->setNome($nome);
        $usuarioDTO->setEmail($email);
        $usuarioDTO->setSenha($senha);

        $usuarioDAO = new usuarioDAO();
        $sucesso = $usuarioDAO->salvar($usuarioDTO);

        if ($sucesso) {
            // Redireciona para win.php após a gravação bem-sucedida
            header("Location: /win.php");
            exit(); // Termina o script após o redirecionamento
        } else {
            echo "Erro ao salvar no banco de dados.";
        }
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
} else {
    echo "Informações do formulário ausentes.";
}
