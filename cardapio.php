<?php
include 'header.php';

    if(isset($_POST["idCart"])){
        include 'modal/exibirPrato.php';
        include 'pesquisar.php';
        echo '<div class="container text-center"><h1>Pedido '.$_POST["idCart"].'</h1></div>
                <input type="hidden" id="postidCart" value="' . $_POST["idCart"] . ' ">';
        echo '<div class="container" id="tableDiv"></div>';
        include 'footer.php';
    }else{
        header("Location: pedidos.php");
    }
    
?>
