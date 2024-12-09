<?php
// Configurações de conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = "";
$database = "meu_sitee";

// Estabelecendo a conexão com o MySQL usando MySQLi
$conexao = mysqli_connect($host, $user, $password, $database);

// Verifica se houve erro na conexão
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>