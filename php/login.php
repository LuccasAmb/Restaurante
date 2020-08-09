<?php include 'database.php';
include 'userData.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$stmt = $conn->prepare("SELECT * FROM funcionarios WHERE Usuario = ? AND Senha = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();


if ($row = $result->fetch_assoc()) {
  session_start();
  $_SESSION = array();
  $_SESSION["User"] = $row["IDFuncionarios"];
  header("location: ../home.php");
} else {
  header("location: ../login.php");
}
$stmt->close();
