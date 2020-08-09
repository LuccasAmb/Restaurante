<?php
include 'header.php';
if(isset($userData) && $userData["Nivel"] == "admin"){

include 'modal/cadastrarFornecedor.php';

echo '
<div class="row justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" id="addModal" href="#" data-toggle="modal" data-target="#registerModal">Adicionar funcionários</a>';
        
    include 'pesquisar.php';
    echo '</nav>';
    echo '<div class="row justify-content-center" id="tableDiv"></div>';
    include 'footer.php';
}
?>
