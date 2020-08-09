<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "restaurante";
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$page = basename($_SERVER['PHP_SELF'], '.php');

$sql = "SHOW TABLES FROM $banco";
$result = $conn->query($sql); 
$arrayCount = 0;
while ($row = $result->fetch_assoc()) {
    $tableNames[$arrayCount] = $row["Tables_in_restaurante"];
    $arrayCount++;
}

?>