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
                <input type="radio" name="tableoptions" value="aberto" autocomplete="off"> Abertos
                </label>
                <label class="btn btn-secondary active">
                <input type="radio" name="tableoptions" value="enviado" autocomplete="off" checked> Para preparar
                </label>
                <label class="btn btn-secondary">
                <input type="radio" name="tableoptions" value="preparo" autocomplete="off"> Em preparo
                </label>
                <label class="btn btn-secondary">
                <input type="radio" name="tableoptions" value="pronto" autocomplete="off"> Preparados
                </label>
            </form>
            </div>
    
    </div>';
    echo '<div class="container" id="tableDiv"></div>';
    include 'footer.php';
}
?>
