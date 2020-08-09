<?php

include 'database.php';
@session_start();
if(isset($_SESSION["User"])){
  $usuario = $_SESSION["User"];
  $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE IDFuncionarios = ? ");
  $stmt->bind_param("i", $usuario);
  $stmt->execute();
  $result = $stmt->get_result();
  $userData = $result->fetch_array(MYSQLI_ASSOC);
}else if(isset($_SESSION["Cliente"])){
  $usuario = $_SESSION["Cliente"];
  $stmt = $conn->prepare("SELECT * FROM clientes WHERE IDClientes = ? ");
  $stmt->bind_param("i", $usuario);
  $stmt->execute();
  $result = $stmt->get_result();
  $userData = $result->fetch_array(MYSQLI_ASSOC);

  $stmt = $conn->prepare("SELECT * FROM mesas WHERE IP = ?");
  $stmt->bind_param("s", $userData["IP"]);
  $stmt->execute();
  $result = $stmt->get_result();
  $userData["Mesa"] = $result->fetch_assoc()["Nome"];
}
?>
