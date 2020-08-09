<?php
include 'header.php';
if(isset($userData)){
    if($userData["Nivel"] != "cliente"){

    include 'modal/alterarSenha.php';
    echo '
                <div class="container" style="max-width: 500px">

                    <form id="formModal" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <fieldset id="formField" disabled="disabled">
                        <input type="hidden" id="formTab" name="tab" value="conta">
                        <input type="hidden" id="crud" name="crud" value="update">
                        <input id="id" type="hidden" name="id" value="'.$userData["IDFuncionarios"].'">
                        <div id="main-cropper" style="height: auto"></div>
                        <div id="cancelImg" class="text-center mb-4"><a href="#" class="noLink">Cancelar imagem</a></div>
                        <div class="text-center mb-4 img-table" id="img-table"><img src="img/layout/null.png"></div>
                            
                            
                                       
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome do funcionário">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tel">Telefone:</label>
                                    <input id="tel" name="tel" type="text" class="form-control" placeholder="Telefone">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="dataNasc">Data de Nascimento:</label>
                                    <input id="dataNasc" name="dataNasc" type="date" class="form-control" placeholder="Data de Nascimento">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="cep">CEP:</label>
                                    <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP">
                                </div>
                            </div>
                        
                            <div class="col">
                                <div class="form-group">
                                    <label for="end">Endereço:</label>
                                    <input id="end" name="end" type="text" class="form-control" placeholder="Endereço">
                                </div>
                            </div>

                            <div class="col" id="upFile">
                                <div class="form-group input-group text-center">
                                    <input accept="image/*" type="file" id="inputFile" class="inputFile"> <label class="file form-control" for="inputFile"> Selecione um arquivo </label>
                                </div>
                            </div>

                        <div class="form-group text-center">
                            <input id="btnModal" type="submit" value="Adicionar" class="btn login_btn">
                        </div>
                    </fieldset>
                    </form>
                    <a id="editModal" href="#" class="noLink">Editar</a>
                    <a id="editPass" class="float-right noLink" href="#" class="noLink">Alterar senha</a>
                </div>
';
    }else{
        echo '<h1> Carrinho </h1>';
    }



    include 'footer.php';
}
?>
