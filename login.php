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
				
			 echo'
				<div class="container d-flex h-100">
					<div class="row justify-content-center align-self-center text-center">

						<div class="divLogin">
							<img src="img/layout/logoficial.png" class="mb-3" style="width: 72%;">

							<form action="php/login.php" id="formLogin" method="POST" enctype="multipart/form-data">
								<input name="tipo" type="hidden" value="funcionario">
								<div class="input-group form-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><img class="table-minimage" src="img/layout/user.png"></span>
									</div>
									<input name="email" type="text" class="form-control" placeholder="Email">
								</div>

								<div class="input-group form-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><img class="table-minimage" src="img/layout/pass.png"></span>
									</div>
									<input name="password" type="password" class="form-control" placeholder="Senha">
								</div>

								<div class="form-group text-center">
									<button type="submit" value="Login" class="btn-primary btnForm">Entrar</button>
								</div>

							</form>

							<a href="index.php" class="text-white">Entrar como cliente</a></div>
				  </div>';

	?>


</body>
</html>