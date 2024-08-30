<?php

$host = "localhost";
$user = "root";
$password = "";

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $password);

// Checa se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS crud");

$conn->select_db("crud");

$conn->query("CREATE TABLE IF NOT EXISTS loja(
            id_loja INT AUTO_INCREMENT PRIMARY KEY,
            nome_loja VARCHAR(100) NOT NULL,
            segmento VARCHAR(100) NOT NULL
            )");

$conn->query("CREATE TABLE IF NOT EXISTS produto(
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    quantidade INT NOT NULL
    )");


?>