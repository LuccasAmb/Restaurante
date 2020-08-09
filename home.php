<?php
include 'php/userData.php';

if(isset($userData["Nivel"])){
	switch($userData["Nivel"]){
		case "admin":
		include 'homeAdmin.php';
		break;

		case "cliente":
		include 'homeCliente.php';
		break;

		case "cozinha":
		include 'homeCozinha.php';
		break;
	}
}else{
	header("Location: index.php");
}
