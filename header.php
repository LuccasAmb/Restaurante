<?php include 'php/userData.php';
echo '
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="style/custom.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/main.css">
  <script src="script/jquery.js"></script>
  <script src="script/bootstrap/bootstrap.js"></script>
  <script src="script/all.js"></script>
  <script src="script/script.js"></script>
  <script type="text/javascript" src="script/jquery.mask.min.js"></script>
  <script src="script/fa.js"></script>';

switch ($page) {
  case "funcionarios":
  case "produtos":
  case "fornecedores":
  case "pratos":
  case "conta":
    echo '<link rel="stylesheet" href="style/cropper.css">
          <script src="script/cropper.js"></script>';
    break;
  case "financas":
    echo '
          <script src="script/jquery-ui.min.js"></script>
          <link rel="stylesheet" href="style/jquery-ui.css">
          <link rel="stylesheet" href="style/finanestilo.css">
          <script src="script/Chart.min.js"></script>
          <script src="script/finan-chart.js"></script>';
  break;

  case "home":
    switch ($userData["Nivel"]) {
      case "admin":
        echo
          '<link rel="stylesheet" href="style/jquery-ui.css">
          <script src="script/jquery-ui.min.js"></script>
          <link rel="stylesheet" href="style/chart.css">
          <script src="script/Chart.min.js"></script>
          <script src="script/main-chart.js"></script>';
        break;

      case "default":
        break;
    }
}


echo '</head>';
?>

    <body>

      <div class="container-fluid" style="padding: 0 0;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="home.php"><img src="img/layout/artelogo.png" style="width: 60px; height: 60px;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php
          if (isset($userData)) {

            switch ($userData["Nivel"]) {
              case "admin":
                echo '
              <div class="collapse navbar-collapse" id="navBar">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-link linkNav"><a class="nav-link" href="funcionarios.php">Funcionários</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="produtos.php">Estoque</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="fornecedores.php">Fornecedores</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="pratos.php">Pratos</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="financas.php">Finanças</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="cardapio.php">Cardápio</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="cozinha.php">Cozinha</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="atendimento.php">Atendimento</a></li>
                  <li class="nav-link linkNav"><a class="nav-link" href="mesas.php">Mesas</a></li>
                </ul>
                ';
                break;

              case "cozinha":
                echo '
              <div class="collapse navbar-collapse" id="navBar">
              <ul class="navbar-nav mr-auto">
                <li class="nav-link linkNav"><a class="nav-link" href="cardapio.php">Cardápio</a></li>
                <li class="nav-link linkNav"><a class="nav-link" href="cozinha.php">Pedidos</a></li>
              </ul>';
                break;

              case "cliente":
                echo '
              <div class="collapse navbar-collapse" id="navBar">
              <ul class="navbar-nav mr-auto">
                <li class="nav-link linkNav"><a class="nav-link" href="pedidos.php">Meus Pedidos</a></li>
              </ul>
              <h1 class="text-light"><small>Mesa:</small> ' . $userData["Mesa"] . '</h1>
              ';
                break;
            }

            echo '     
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-5" href="#" id="navBarDropdown" data-toggle="dropdown">' . $userData["Nome"] . '</a>
                <div class="dropdown-menu bg-dark">';
            if ($userData["Nivel"] != "cliente") {
              echo '<a class="dropdown-item" href="conta.php">Conta</a>';
              echo '<a class="dropdown-item" href="php/logout.php">Sair</a>';
            }

            echo '  
                </div>
              </li>
            </ul>
        ';
          } else {
            echo '
        <div class="collapse navbar-collapse" id="navBar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-link linkNav"><a class="nav-link" href="index.php">Entrar</a></li>
        </ul>';
          }
          ?>
      </div>
      </nav>
      </div>

      <div class='container'>