CREATE DATABASE IF NOT EXISTS WareGenix;

USE WareGenix;

CREATE TABLE IF NOT EXISTS `user` (
    `idusuario` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255),
    `usuario` VARCHAR(100),
    `email` VARCHAR(255),
    `senha` VARCHAR(255)
);
