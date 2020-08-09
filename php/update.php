<?php
include 'database.php';

        $id = $_POST['id'];
        $atual = md5($_POST['atual']);
        $nova = $_POST['nova'];
        $nova2 = $_POST['nova2'];

        if($nova == $nova2){
            $stmt2 = $conn->prepare("SELECT Senha FROM funcionarios WHERE IDFuncionarios=$id");
            $stmt2->execute();
            $senhaAtual = $stmt2->get_result()->fetch_assoc()["Senha"];
            $stmt2->close();
            if($atual == $senhaAtual){
                $stmt = $conn->prepare("UPDATE funcionarios SET Senha= ? WHERE IDFuncionarios=$id");
                $stmt->bind_param("s", md5($nova));
                $stmt->execute();
                $stmt->close();
            }
            
        }

?>
