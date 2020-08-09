<?php

$tab = $_POST['tab'];
$id = $_POST['id'];

include 'userData.php';
if (isset($userData)) {
  if ($userData["Nivel"] == "admin") {
    include 'database.php';



    $stmt = $conn->prepare("UPDATE $tab SET Estado = 'off' WHERE ID" . $tab . " = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("location: ../home.php");
  } else if ($userData["Nivel"] == "cliente") {
    if ($tab == "pedidos") {
      $idItens = $_POST['idItens'];
      $stmt = $conn->prepare("DELETE FROM itens WHERE IDItens = ?");
      $stmt->bind_param("i", $idItens);
      $stmt->execute();
    }
  }
}

?>
