<?php

$host = "localhost";
$port = "3306";
$dbname = "crud";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);

} catch (PDOException $err) {
    echo "Erro na conexão." . $err->getMessage();
}
?>