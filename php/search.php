<?php
include 'userData.php';

$search = $_POST['search'];
$tab = $_POST['tab'];
$sort = $_POST['sort'];
$ord = $_POST['ord'];
$estado = "on";

if ($tab == "cardapio") {
    $tab = "pratos";
}

if (isset($userData)) {
    include 'database.php';

    $order = "";
    switch ($sort) {
        case "default":
            $order = "ID" . $tab . " " . $ord;
            break;
        case "#":
            $order = "ID" . $tab . " " . $ord;
            break;
        case "Nome":
            $order = "Nome " . $ord;
            break;
    }

    switch ($tab) {
        case "produtos":
            switch ($sort) {
                case "Qtd.":
                    $order = "Qtd " . $ord;
                    break;
                case "Preço (unidade)":
                    $order = "Preco " . $ord;
                    break;
                case "Data de Fabric.":
                    $order = "DataFab " . $ord;
                    break;
                case "Data de Val.":
                    $order = "DataVal " . $ord;
                    break;
            }
            break;
        case "funcionarios":
            switch ($sort) {
                case "Salário":
                    $order = "Salario " . $ord;
                    break;
                case "Data de Admiss.":
                    $order = "DataAdmissao " . $ord;
                    break;
            }
            break;
        case "pratos":
            switch ($sort) {
                case "Preço":
                    $order = "Preco " . $ord;
                    break;
            }
            break;
    }


    if (empty($_POST['search'])) {
        $stmt = $conn->prepare("SELECT * FROM $tab WHERE Estado = ? ORDER BY " . $order);
        $stmt->bind_param("s", $estado);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        $stmt = $conn->prepare("SELECT * FROM $tab WHERE Nome LIKE CONCAT(?, '%') AND Estado = ? ORDER BY " . $order);
        $stmt->bind_param("ss", $search, $estado);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    switch ($tab) {
        case "produtos":
            foreach ($result as $key => $value) {
                $IDForn = $result[$key]["IDFornecedores"];
                $stmt2 = $conn->prepare("SELECT Nome FROM fornecedores WHERE IDFornecedores = $IDForn");
                $stmt2->execute();
                $result[$key]["Fornecedor"] = $stmt2->get_result()->fetch_assoc()["Nome"];
                $stmt2->close();

                $IDCat = $result[$key]["IDCategorias"];
                $stmt2 = $conn->prepare("SELECT Nome FROM categorias WHERE IDCategorias = $IDCat");
                $stmt2->execute();
                $result[$key]["Categoria"] = $stmt2->get_result()->fetch_assoc()["Nome"];
                $stmt2->close();

                $IDMed = $result[$key]["IDMedidas"];
                $stmt2 = $conn->prepare("SELECT * FROM medidas WHERE IDMedidas = $IDMed");
                $stmt2->execute();
                $result[$key]["Medida"] = $stmt2->get_result()->fetch_assoc()["Nome"];
                $stmt2->close();
            }
            break;
        case "funcionarios":
            foreach ($result as $key => $value) {
                $IDCargo = $result[$key]["IDCargos"];
                $stmt2 = $conn->prepare("SELECT Nome FROM cargos WHERE IDCargos = $IDCargo");
                $stmt2->execute();
                $result[$key]["Cargo"] = $stmt2->get_result()->fetch_assoc()["Nome"];
                $stmt2->close();
            }
            break;
    }



    echo json_encode($result);
    $stmt->close();
}
