<?php
include 'header.php';
if(isset($userData)){
    include 'modal/exibirPedido.php';
    //include 'modal/confirmarCarrinho.php';


    echo '

    <div class="container mt-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <form id="tableoptionsform">
                <label class="btn btn-secondary">
                <input type="radio" name="tableoptions" value="pronto" checked autocomplete="off"> Preparados
                </label>
                <label class="btn btn-secondary">
                <input type="radio" name="tableoptions" value="entregue" autocomplete="off"> Entregues
                </label>
                <label class="btn btn-secondary">
                <input type="radio" name="tableoptions" value="finalizado" autocomplete="off"> Finalizados
                </label>
            </form>
            </div>
    
    </div>';
    echo '<div class="container" id="tableDiv"></div>';
    include 'footer.php';
}
?>
