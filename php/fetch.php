<?php

include 'userData.php';

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "restaurante";
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$thisID = $_POST["thisID"];
$tab = $_POST["tab"];

if ($tab == "conta") {
    $tab = "funcionarios";
}

if ($tab != "cardapio" && $tab != "pedidos" && $tab != "cozinha" && $tab != "atendimento") {
    $sql = "SELECT * FROM $tab WHERE ID" . $tab . " = $thisID";
    $result = mysqli_fetch_array($conn->query($sql));
}



$html = "";

switch ($tab) {
    case "produtos":
        $sql = "SELECT * FROM categorias ORDER BY IDCategorias DESC";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione a categoria</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDCategorias"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlCat"] = $html;

        $sql = "SELECT * FROM fornecedores ORDER BY IDFornecedores";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione a categoria</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDFornecedores"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlForn"] = $html;

        $sql = "SELECT * FROM medidas";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione a medida</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDMedidas"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlMedidas"] = $html;
        
        $conn->close();
        break;


    case "funcionarios":
        $sql = "SELECT * FROM cargos ORDER BY IDCargos";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione o cargo</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDCargos"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlCargo"] = $html;
        $conn->close();
        break;
    case "pratos":
        $sql = "SELECT * FROM produtos WHERE IDCategorias = 1";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione o ingrediente</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDProdutos"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlIngrediente"] = $html;

        $sql = "SELECT * FROM medidas";
        $res = $conn->query($sql);
        $html = "<option selected>Selecione a medida</option>";
        while ($row = $res->fetch_assoc()) {
            $html .= '<option value="' . $row["IDMedidas"] . '">' . $row["Nome"] . '</option>';
        }
        $result["htmlMedida"] = $html;

        $stmt = $conn->prepare("SELECT * FROM ingredientes WHERE IDPratos = ? ORDER BY Qtd DESC");
        $stmt->bind_param("s", $thisID);
        $stmt->execute();
        $ingredientes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $result["Ingredientes"] = $ingredientes;
        break;

    case "cozinha":
    case "atendimento":
        $result = array();

        $stmt = $conn->prepare("SELECT * FROM pedidos WHERE IDPedidos = ?");
        $stmt->bind_param("s", $thisID);
        $stmt->execute();
        $cart = $stmt->get_result()->fetch_assoc();

        $result["IDPedidos"] = $cart["IDPedidos"];
        $result["Estado"] = $cart["Estado"];

        $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
        $stmt->bind_param("s", $cart["IDPedidos"]);
        $stmt->execute();
        $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        foreach ($itens as $key => $item) {
            $idPrato = $item["IDPratos"];
            $stmt = $conn->prepare("SELECT * FROM pratos WHERE IDPratos = ?");
            $stmt->bind_param("s", $idPrato);
            $stmt->execute();
            $result["Pedidos"][$key] = $stmt->get_result()->fetch_assoc();
            $result["Pedidos"][$key]["Qtd"] = $item["Qtd"];
            $result["Pedidos"][$key]["Obs"] = $item["Obs"];
        }

        $stmt = $conn->prepare("SELECT * FROM clientes WHERE IDClientes = ?");
        $stmt->bind_param("s", $cart["IDClientes"]);
        $stmt->execute();
        $cliente = $stmt->get_result()->fetch_assoc();

        $stmt = $conn->prepare("SELECT * FROM mesas WHERE IP = ?");
        $stmt->bind_param("s", $cliente["IP"]);
        $stmt->execute();
        $mesa = $stmt->get_result()->fetch_assoc();

        $result["IDPedidos"] = $thisID;
        $result["Nome"] = $cliente["Nome"];
        $result["Mesa"] = $mesa["Nome"];
        $result["IP"] = $cliente["IP"];
        break;

    case "cardapio":
        $stmt = $conn->prepare("SELECT * FROM pratos WHERE IDPratos = ?");
        $stmt->bind_param("s", $thisID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        $idCart = $_POST["idCart"];

        $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPratos = ? AND IDPedidos = ?");
        $stmt->bind_param("ss", $thisID, $idCart);
        $stmt->execute();
        $item = $stmt->get_result()->fetch_assoc();

        if ($item != null) {
            $result["QtdAtt"] = $item["Qtd"];
            $result["idItens"] = $item["IDItens"];
            $result["Obs"] = $item["Obs"];
        }

        $stmt->close();
        break;

    case "pedidos":
        $result = array();

        $stmt = $conn->prepare("SELECT * FROM pedidos WHERE IDPedidos = ?");
        $stmt->bind_param("s", $thisID);
        $stmt->execute();
        $cart = $stmt->get_result()->fetch_assoc();

        $result["IDPedidos"] = $cart["IDPedidos"];
        $result["Estado"] = $cart["Estado"];

        $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
        $stmt->bind_param("s", $cart["IDPedidos"]);
        $stmt->execute();
        $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


        foreach ($itens as $key => $item) {
            $idPrato = $item["IDPratos"];
            $stmt = $conn->prepare("SELECT * FROM pratos WHERE IDPratos = ?");
            $stmt->bind_param("s", $idPrato);
            $stmt->execute();
            $result["Pedidos"][$key] = $stmt->get_result()->fetch_assoc();
            $result["Pedidos"][$key]["Qtd"] = $item["Qtd"];
            $result["Pedidos"][$key]["Obs"] = $item["Obs"];
        }

        break;
}


echo json_encode($result);
