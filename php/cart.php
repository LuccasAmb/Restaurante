<?php
include 'database.php';
include 'userData.php';

if (isset($userData)) {
    switch ($_POST["action"]) {
        case "loadcart":
            switch ($_POST["page"]) {
                case "pedidos":
                    $result = array();

                    $stmt = $conn->prepare("SELECT * FROM pedidos WHERE IDClientes = ? AND Estado != 'finalizado' ORDER BY IDPedidos ASC");
                    $stmt->bind_param("s", $userData["IDClientes"]);
                    $stmt->execute();
                    $carts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                    if ($carts == null) {
                        $clienteCart = 0;
                    } else {
                        for ($i = 0; $i < count($carts); $i++) {
                            $stmt = $conn->prepare("SELECT * FROM clientes WHERE IDClientes = ?");
                            $stmt->bind_param("s", $carts[$i]["IDClientes"]);
                            $stmt->execute();
                            $cliente = $stmt->get_result()->fetch_assoc();

                            $stmt = $conn->prepare("SELECT * FROM mesas WHERE IP = ?");
                            $stmt->bind_param("s", $cliente["IP"]);
                            $stmt->execute();
                            $mesa = $stmt->get_result()->fetch_assoc();

                            $total = 0;

                            $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
                            $stmt->bind_param("s", $carts[$i]["IDPedidos"]);
                            $stmt->execute();
                            $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                            for ($j = 0; $j < count($itens); $j++) {
                                $stmt = $conn->prepare("SELECT * FROM pratos WHERE IDPratos = ?");
                                $stmt->bind_param("s", $itens[$j]["IDPratos"]);
                                $stmt->execute();
                                $prato = $stmt->get_result()->fetch_assoc();

                                $total += $prato["Preco"] * $itens[$j]["Qtd"];
                            }
                            $clienteCart[$i]["IDPedidos"] = $carts[$i]["IDPedidos"];
                            $clienteCart[$i]["Estado"] = $carts[$i]["Estado"];
                            $datetime = new DateTime($carts[$i]["DataEnvio"]);
                            $clienteCart[$i]["Data"] = $datetime->format('Y-m-d');
                            $clienteCart[$i]["Hora"] = $datetime->format('H:i:s');
                            $clienteCart[$i]["Cliente"] = $cliente["Nome"];
                            $clienteCart[$i]["Mesa"] = $mesa["Nome"];
                            $clienteCart[$i]["IP"] = $cliente["IP"];
                            $clienteCart[$i]["Total"] = $total;
                        }
                    }

                    echo json_encode($clienteCart);
                    break;

                case "cozinha":
                case "atendimento":
                    $clienteCart = array();

                    $estado = $_POST["tableoption"];
                    $stmt = $conn->prepare("SELECT * FROM pedidos WHERE Estado = ? ORDER BY IDPedidos ASC");
                    $stmt->bind_param("s", $estado);
                    $stmt->execute();
                    $carts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                    if ($carts == null) {
                        $clienteCart = 0;
                    } else {
                        for ($i = 0; $i < count($carts); $i++) {
                            $stmt = $conn->prepare("SELECT * FROM clientes WHERE IDClientes = ?");
                            $stmt->bind_param("s", $carts[$i]["IDClientes"]);
                            $stmt->execute();
                            $cliente = $stmt->get_result()->fetch_assoc();

                            $stmt = $conn->prepare("SELECT * FROM mesas WHERE IP = ?");
                            $stmt->bind_param("s", $cliente["IP"]);
                            $stmt->execute();
                            $mesa = $stmt->get_result()->fetch_assoc();

                            $total = 0;
                            $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
                            $stmt->bind_param("s", $carts[$i]["IDPedidos"]);
                            $stmt->execute();
                            $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                            for ($j = 0; $j < count($itens); $j++) {
                                $stmt = $conn->prepare("SELECT * FROM pratos WHERE IDPratos = ?");
                                $stmt->bind_param("s", $itens[$j]["IDPratos"]);
                                $stmt->execute();
                                $prato = $stmt->get_result()->fetch_assoc();
                                $total += $prato["Preco"] * $itens[$j]["Qtd"];
                            }

                            $clienteCart[$i]["IDPedidos"] = $carts[$i]["IDPedidos"];
                            $clienteCart[$i]["Estado"] = $carts[$i]["Estado"];
                            $clienteCart[$i]["Cliente"] = $cliente["Nome"];
                            $clienteCart[$i]["Mesa"] = $mesa["Nome"];
                            $clienteCart[$i]["IP"] = $cliente["IP"];
                            $clienteCart[$i]["Total"] = $total;
                        }
                    }
                    echo json_encode($clienteCart);
                    break;
            }

            break;
        case "add":
            $tab = $_POST['tab'];
            $idCart = $_POST['idCart'];
            $idPrato = $_POST['id'];
            $qtd = $_POST['qtd'];
            $obs = $_POST['obs'];

            $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPratos = ? AND IDPedidos = ?");
            $stmt->bind_param("ss", $idPrato, $idCart);
            $stmt->execute();
            $itens = $stmt->get_result()->fetch_assoc();
            if (count($itens) >= 1) {
                $stmt = $conn->prepare("UPDATE itens SET Qtd = ?, Obs = ? WHERE IDPratos = ? AND IDPedidos = ?");
                $stmt->bind_param("ssss", $qtd, $obs, $idPrato, $idCart);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare("INSERT INTO itens (IDItens, IDPedidos, IDPratos, Qtd, Obs) VALUES (null, ?, ?, ?, ?)");
                $stmt->bind_param("ssss", $idCart, $idPrato, $qtd, $obs);
                $stmt->execute();
            }
            break;

        case "deletecart":
            $stmt = $conn->prepare("SELECT * FROM pedidos WHERE IDClientes = ?");
            $stmt->bind_param("s", $userData["IDClientes"]);
            $stmt->execute();
            $cart = $stmt->get_result()->fetch_assoc();

            $stmt = $conn->prepare("DELETE FROM itens WHERE IDPedidos = ?");
            $stmt->bind_param("i", $cart["IDPedidos"]);
            $stmt->execute();
            break;

        case "cancelsentcart":
            $stmt = $conn->prepare("UPDATE pedidos SET Estado = 'aberto' WHERE IDClientes = ?");
            $stmt->bind_param("i", $userData["IDClientes"]);
            $stmt->execute();
            break;

        case "changeEstado":
            switch ($_POST["estado"]) {
                default:
                    $stmt = $conn->prepare("UPDATE pedidos SET Estado = ? WHERE IDPedidos = ?");
                    $stmt->bind_param("si", $_POST["estado"], $_POST["id"]);
                    $stmt->execute();
                    break;
                case "delete":
                    $stmt = $conn->prepare("DELETE FROM itens WHERE IDPedidos = ?");
                    $stmt->bind_param("i", $_POST["id"]);
                    $stmt->execute();
                    break;
                case "enviado":
                    $dataNow = new DateTime('now', new DateTimeZone("-3"));
                    $stmt = $conn->prepare("UPDATE pedidos SET Estado =?, DataEnvio =? WHERE IDPedidos = ?");
                    $stmt->bind_param("ssi", $_POST["estado"], $dataNow->format('Y-m-d H:i:s'), $_POST["id"]);
                    $stmt->execute();
                    break;
                case "pronto":
                    $stmt = $conn->prepare("UPDATE pedidos SET Estado = ? WHERE IDPedidos = ?");
                    $stmt->bind_param("si", $_POST["estado"], $_POST["id"]);
                    $stmt->execute();

                    $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
                    $stmt->bind_param("s", $_POST["id"]);
                    $stmt->execute();
                    $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                    for ($i = 0; $i < count($itens); $i++) {
                        $stmt = $conn->prepare("SELECT * FROM ingredientes WHERE IDPratos = ?");
                        $stmt->bind_param("s", $itens[$i]["IDPratos"]);
                        $stmt->execute();
                        $ingredientes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                        for ($j = 0; $j < count($ingredientes); $j++) {
                            $stmt = $conn->prepare("SELECT * FROM produtos WHERE IDProdutos = ?");
                            $stmt->bind_param("s", $ingredientes[$j]["IDProdutos"]);
                            $stmt->execute();
                            $produto = $stmt->get_result()->fetch_assoc();

                            $qtdAtual = $produto["Qtd"] - ($ingredientes[$j]["Qtd"] * $itens[$i]["Qtd"]);

                            $stmt = $conn->prepare("UPDATE produtos SET Qtd = ? WHERE IDProdutos = ?");
                            $stmt->bind_param("ss", $qtdAtual, $ingredientes[$j]["IDProdutos"]);
                            $stmt->execute();
                        }
                    }

                    $stmt = $conn->prepare("UPDATE produtos SET Qtd =? WHERE IDPedidos = ?");
                    $stmt->bind_param("ss", $_POST["estado"], $_POST["id"]);
                    $stmt->execute();


                    break;
                case "preparo":
                    $stmt = $conn->prepare("SELECT * FROM pedidos WHERE IDPedidos = ?");
                    $stmt->bind_param("s", $_POST["id"]);
                    $stmt->execute();
                    $pedido = $stmt->get_result()->fetch_assoc();

                    if ($pedido["Estado"] == "pronto") {
                        
                        $stmt = $conn->prepare("SELECT * FROM itens WHERE IDPedidos = ?");
                        $stmt->bind_param("s", $_POST["id"]);
                        $stmt->execute();
                        $itens = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                        for ($i = 0; $i < count($itens); $i++) {
                            $stmt = $conn->prepare("SELECT * FROM ingredientes WHERE IDPratos = ?");
                            $stmt->bind_param("s", $itens[$i]["IDPratos"]);
                            $stmt->execute();
                            $ingredientes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                            for ($j = 0; $j < count($ingredientes); $j++) {
                                $stmt = $conn->prepare("SELECT * FROM produtos WHERE IDProdutos = ?");
                                $stmt->bind_param("s", $ingredientes[$j]["IDProdutos"]);
                                $stmt->execute();
                                $produto = $stmt->get_result()->fetch_assoc();

                                $qtdAtual = $produto["Qtd"] - ($ingredientes[$j]["Qtd"] * $itens[$i]["Qtd"]);

                                $stmt = $conn->prepare("UPDATE produtos SET Qtd = ? WHERE IDProdutos = ?");
                                $stmt->bind_param("ss", $qtdAtual, $ingredientes[$j]["IDProdutos"]);
                                $stmt->execute();
                            }
                        }
                    }



                    $stmt = $conn->prepare("UPDATE produtos SET Qtd =? WHERE IDPedidos = ?");
                    $stmt->bind_param("ssi", $_POST["estado"], $dataNow->format('Y-m-d H:i:s'), $_POST["id"]);
                    $stmt->execute();
                    break;
            }
            break;

        case "newCart":
            $stmt = $conn->prepare("INSERT INTO pedidos (IDPedidos, IDClientes) VALUES (null, ?)");
            $stmt->bind_param("s", $userData["IDClientes"]);
            $stmt->execute();
            echo json_encode("oi");
            break;
    }
}
