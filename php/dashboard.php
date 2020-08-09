<?php
include 'userData.php';


switch($_POST["action"]){
  case "update":
  $items = $_POST['items'];

  $stmt = $conn->prepare("DELETE FROM tarefas WHERE IDFuncionarios = ?");
  $stmt->bind_param("s", $userData["IDFuncionarios"]);
  $stmt->execute();
  
  for ($i = 0; $i < count($items); $i++) {
    $stmt = $conn->prepare("INSERT INTO tarefas (IDTarefas, Descricao, IDFuncionarios) VALUES (null, ?, ?)");
    $stmt->bind_param("ss", $items[$i], $userData["IDFuncionarios"]);
    $stmt->execute();
  }
  
  

  break;

  case "fetch":
  $stmt = $conn->prepare("SELECT * FROM tarefas WHERE IDFuncionarios = ? ORDER BY IDTarefas ASC");
  $stmt->bind_param("s", $userData["IDFuncionarios"]);
  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  echo json_encode($result);
  break;
}

$stmt->close();

