<?php

require_once('../config/database.php'); // Inclui a classe de conexão

try {
    $conexao = Conexao::getInstance(); // Tenta obter a conexão com o banco de dados

    // Se chegou até aqui sem lançar exceções, a conexão foi bem-sucedida
    echo "Conexão bem-sucedida!";
} catch (Exception $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
