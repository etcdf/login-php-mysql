<?php
session_start(); // Inicia a sessão

session_destroy(); // Destrói todos os dados registrados na sessão

// Redireciona o usuário para a página de login usando JavaScript
echo "<script>";
echo "window.location.href = '../Views/login.php';";
echo "</script> ";
?>
