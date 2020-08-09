<?php
include 'userData.php';

/* 
$stmt = $conn->prepare("UPDATE pedidos SET Estado = 'fechado' WHERE IDClientes = ?");
$stmt->bind_param("s", $userData["IDClientes"]);
$stmt->execute(); */

session_start();
session_destroy();

header ("location: ../index.php");
