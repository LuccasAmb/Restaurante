<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="style/custom.css" rel="stylesheet" type="text/css">
  <link href="style/style.css" rel="stylesheet" type="text/css">
  <link href="style/login.css" rel="stylesheet" type="text/css">
  <script src="script/jquery.js"></script>
  <script src="script/script.js"></script>
  <script src="script/bootstrap/bootstrap.js"></script>

</head>

<body>
	<?php
		include 'php/userData.php';
		if(!isset($userData["Nivel"])){
			$ip = $_SERVER['REMOTE_ADDR'];
            $stmt = $conn->prepare("SELECT * FROM clientes WHERE IP = ?");
            $stmt->bind_param("s", $ip);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();

            if($result["IP"] != $ip){
                $stmt = $conn->prepare("INSERT INTO clientes (IDClientes, Nome, IP, Nivel) VALUES (null, 'Cliente', ?, 'cliente')");
                $stmt->bind_param("s", $ip);
                $stmt->execute();
            }        

            $_SESSION["Cliente"] = $result["IDClientes"];
            $stmt->close();
            header("Location: home.php");
		}else{
			header("Location: home.php");
		}
	?>


</body>
</html>