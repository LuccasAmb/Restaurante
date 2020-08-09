<?php
include 'database.php';
include 'userData.php';

if (isset($userData)) {
    switch ($_POST["page"]) {
        case "financas":
            $result = array();

            $stmt = $conn->prepare("SELECT * FROM custos WHERE YEARWEEK(Dia, 1) = YEARWEEK(CURDATE(), 1) AND Tipo = 'despesa'");
            $stmt->execute();
            $result["Despesas"] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            for($i = 0; $i < count($result["Despesas"]); $i++){
                $weekday = date('l', strtotime($result["Despesas"][$i]["Dia"]));
                $result["Despesas"][$i]["Weekday"] = $weekday;
            }

            $stmt = $conn->prepare("SELECT * FROM custos WHERE YEARWEEK(Dia, 1) = YEARWEEK(CURDATE(), 1) AND Tipo = 'receita'");
            $stmt->execute();
            $result["Receitas"] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            for($i = 0; $i < count($result["Receitas"]); $i++){
                $weekday = date('l', strtotime($result["Receitas"][$i]["Dia"]));
                $result["Receitas"][$i]["Weekday"] = $weekday;
            }

            echo json_encode($result);
            $stmt->close();
            break;
    }
}
