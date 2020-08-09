<?php
include 'database.php';


function RandomImg($img, $tab, $namefile)
{

    if ($img != "") {
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1, 10)));
        $destino = '../img/' . $tab . '/' . $filename . '.png';
        file_put_contents($destino, $image_base64);
        $filename = $filename . '.png';
    } else if ($namefile != "" && $namefile != "undefined") {
        $filename = $namefile;
    } else {
        $filename = "null.png";
    }

    return $filename;
}


$tab = $_POST["tab"];
$crud = $_POST['crud'];

switch ($tab) {
    case "fornecedores":
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $tel = $_POST['tel'];
        $end = $_POST['end'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $prazo = $_POST['prazo'];
        $pags = $_POST['pags'];
        $obs = $_POST['obs'];
        $img = $_POST["img"];
        $namefile = $_POST['filename'];
        $filename = RandomImg($img, $tab, $namefile);


        switch ($crud) {
            case "insert":
                $stmt = $conn->prepare("INSERT INTO fornecedores (IDFornecedores, Nome, CNPJ, Telefone, Endereco, Email, CEP, Prazo, Pagamento, Observacoes, Foto) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
                break;
            case "update":
                $stmt = $conn->prepare("UPDATE fornecedores SET Nome= ?, CNPJ= ?, Telefone= ?, Endereco= ?, Email= ?, CEP= ?, Prazo= ?, Pagamento= ?, Observacoes= ?, Foto= ? WHERE IDFornecedores=$id");
                break;
        }
        $stmt->bind_param("ssssssssss", $nome, $cnpj, $tel, $end, $email, $cep, $prazo, $pags, $obs, $filename);
        $stmt->execute();
        $stmt->close();
        break;

    case "conta":
    case "funcionarios":
        $id = $_POST['id'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $tel = $_POST['tel'];
        $idCargo = $_POST['cargo'];
        $sal = $_POST['sal'];
        $dataAdm = $_POST['dataAdm'];
        $dataNasc = $_POST['dataNasc'];
        $end = $_POST['end'];
        $cep = $_POST['cep'];
        $cpf = $_POST['cpf'];
        $nivel = $_POST['nivel'];
        $img = $_POST['img'];
        $namefile = $_POST['filename'];
        $filename = RandomImg($img, $tab, $namefile);


        if (isset($_POST['txtCargo']) && $_POST['txtCargo'] != "" && $_POST['txtCargo'] != null) {
            $stmt = $conn->prepare("INSERT INTO cargos VALUES (null, ?)");
            $stmt->bind_param("s", $_POST["txtCargo"]);
            $stmt->execute();
            $stmt->close();
            $stmt = $conn->prepare("SELECT IDCargos FROM cargos WHERE Nome= ?");
            $stmt->bind_param("s", $_POST["txtCargo"]);
            $stmt->execute();
            $idCargo = $stmt->get_result()->fetch_assoc()["IDCargos"];
        }
        if ($tab == "funcionarios") {
            switch ($crud) {
                case "insert":
                    $stmt = $conn->prepare("INSERT INTO funcionarios (IDFuncionarios, Nome, Nivel, Telefone, IDCargos, Salario, DataAdmissao, DataNasc, Endereco, CEP, CPF, Foto) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    break;
                case "update":
                    $stmt = $conn->prepare("UPDATE funcionarios SET Nome= ?, Nivel=?, Telefone= ?, IDCargos= ?, Salario=?, DataAdmissao= ?, DataNasc= ?, Endereco= ?, CEP= ?, CPF=?, Foto= ? WHERE IDFuncionarios=$id");
                    break;
            }

            $stmt->bind_param("sssisssssss", $nome, $nivel, $tel, $idCargo, $sal, $dataAdm, $dataNasc, $end, $cep, $cpf, $filename);
            $stmt->execute();
            $stmt->close();
        } elseif ($tab == "conta") {
            $stmt = $conn->prepare("UPDATE funcionarios SET Usuario= ?, Nome= ?, Telefone= ?, DataNasc= ?, Endereco= ?, CEP= ?, Foto= ? WHERE IDFuncionarios=$id");
            $stmt->bind_param("sssssss", $email, $nome, $tel, $dataNasc, $end, $cep, $filename);
            $stmt->execute();
            $stmt->close();
        }

        break;

    case "produtos":
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $qtd = $_POST['qtd'];
        $medida = $_POST['medida'];
        $cod = $_POST['cod'];
        $dataFab = $_POST['dataFab'];
        $dataVal = $_POST['dataVal'];
        $idForn = $_POST['idForn'];
        $idCat = $_POST['categoria'];
        $img = $_POST["img"];
        $namefile = $_POST['filename'];
        $filename = RandomImg($img, $tab, $namefile);

        if (isset($_POST['txtCat']) && $_POST['txtCat'] != "" && $_POST['txtCat'] != null) {
            $stmt = $conn->prepare("INSERT INTO categorias VALUES (null, ?)");
            $stmt->bind_param("s", $_POST["txtCat"]);
            $stmt->execute();
            $stmt->close();
            $stmt = $conn->prepare("SELECT IDCategorias FROM categorias WHERE Nome= ?");
            $stmt->bind_param("s", $_POST["txtCat"]);
            $stmt->execute();
            $idCat = $stmt->get_result()->fetch_assoc()["IDCategorias"];
        }

        switch ($crud) {
            case "insert":
                $stmt = $conn->prepare("INSERT INTO produtos (IDProdutos, Nome, Qtd, IDMedidas, CodBarra, DataFab, DataVal, IDFornecedores, IDCategorias, Foto) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                break;
            case "update":
                $stmt = $conn->prepare("UPDATE produtos SET Nome= ?, Qtd= ?, IDMedidas= ?, CodBarra= ?, DataFab= ?, DataVal= ?, IDFornecedores= ?, IDCategorias= ?, Foto= ? WHERE IDProdutos=$id");
                break;
        }

        $stmt->bind_param("sisissiis", $nome, $qtd, $medida, $cod, $dataFab, $dataVal, $idForn, $idCat, $filename);
        $stmt->execute();
        $stmt->close();
        break;

    case "pratos":
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $preco = $_POST['preco'];
        $idIngrediente = $_POST['ingrediente'];
        $qtd = $_POST['qtd'];
        $medida = $_POST['medida'];
        $img = $_POST["img"];
        $namefile = $_POST['filename'];
        $filename = RandomImg($img, $tab, $namefile);

        switch ($crud) {
            case "insert":
                $stmt = $conn->prepare("INSERT INTO pratos (IDPratos, Nome, Descricao, Preco, Foto) VALUES (null, ?, ?, ?, ?)");
                break;
            case "update":
                $stmt = $conn->prepare("UPDATE pratos SET Nome= ?, Descricao= ?, Preco= ?, Foto= ? WHERE IDPratos=$id");
                break;
        }

        $stmt->bind_param("ssss", $nome, $desc, $preco, $filename);
        $stmt->execute();

        if ($crud == "insert") {
            $stmt = $conn->prepare("SELECT * FROM pratos WHERE Nome = ? AND Descricao = ? AND Preco = ? AND Foto = ?");
            $stmt->bind_param("ssss", $nome, $desc, $preco, $filename);
            $stmt->execute();
            $prato = $stmt->get_result()->fetch_assoc();
            $id = $prato["IDPratos"];
        }

        $stmt = $conn->prepare("DELETE FROM ingredientes WHERE IDPratos = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        for ($i = 0; $i < count($idIngrediente); $i++) {
            $stmt = $conn->prepare("INSERT INTO ingredientes (IDIngredientes, IDProdutos, IDPratos, Qtd, IDMedidas) VALUES (null, ?, ?, ?, ?)");
            $stmt->bind_param("ssss", $idIngrediente[$i], $id, $qtd[$i], $medida[$i]);
            $stmt->execute();
        }
        $stmt->close();
        break;

    case "mesas":
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $ip = $_POST['ip'];

        switch ($crud) {
            case "insert":
                $stmt = $conn->prepare("INSERT INTO mesas (IDMesas, Nome, IP) VALUES (null, ?, ?)");
                break;
            case "update":
                $stmt = $conn->prepare("UPDATE mesas SET Nome= ?, IP= ? WHERE IDMesas=$id");
                break;
        }

        $stmt->bind_param("ss", $nome, $ip);
        $stmt->execute();
        $stmt->close();
        break;
    case "financas":
        $dia = $_POST['dia'];
        $val = $_POST['val'];
        $tipo = $_POST['tipo'];

        $stmt = $conn->prepare("INSERT INTO custos (IDCustos, Dia, Valor, Tipo) VALUES (null, ?, ?, ?)");
        $stmt->bind_param("sss", $dia, $val, $tipo);
        $stmt->execute();
        $stmt->close();
        break;
}

echo json_encode("oi");
header("location: ../" . $tab . ".php");
