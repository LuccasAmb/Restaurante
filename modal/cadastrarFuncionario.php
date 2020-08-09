<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
  echo'
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Adicionar um funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <span id="msg-error"></span>
                <div class="container">

                    <form id="formModal" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <fieldset id="formField" disabled="disabled">
                        <input type="hidden" id="formTab" name="tab" value="funcionarios">
                        <input type="hidden" id="crud" name="crud" value="insert">
                        <input id="id" type="hidden" name="id">
                        <div class="img-container">
                        <img id="image" src="img/layout/null.png" alt="Picture">
                        </div>
                        <div id="cancelImg" class="text-center mb-4"><a href="#" class="noLink">Cancelar imagem</a></div>
                        <div class="form-row">
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

                        </div>

                        <div class="form-row text-center">
                        
                            <div class="form-check form-check-inline">
                                <label class="radio-inline"><input type="radio" checked value="funcionarios" name="nivel">Funcionário</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="radio-inline"><input type="radio" value="admin" name="nivel">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="radio-inline"><input type="radio" value="cozinha" name="nivel">Cozinha</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="radio-inline"><input type="radio" value="atendimento" name="nivel">Atendimento</label>
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="txtCargo">Cargo:</label><a id="addCat" class="noLink" href="#"> + Nova</a>
                                    <input id="txtCargo" name="txtCargo" type="text" class="form-control" placeholder="Cargo">
                                    <select id="cargo" name="cargo" class="custom-select"></select>
                                </div>
                            </div>
                            

                            <div class="col">
                                <div class="form-group">
                                    <label for="sal">Salário:</label>
                                    <input id="sal" name="sal" type="text" class="form-control" placeholder="Salário">
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="dataNasc">Data de Nascimento:</label>
                                    <input id="dataNasc" name="dataNasc" type="date" class="form-control" placeholder="Data de Nascimento">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="dataAdm">Data de Admissão:</label>
                                    <input id="dataAdm" name="dataAdm" type="date" class="form-control" placeholder="Data de Admissão">
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cep">CEP:</label>
                                    <input id="cep" name="cep" type="text" class="form-control" placeholder="CEP">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="end">Endereço:</label>
                                    <input id="end" name="end" type="text" class="form-control" placeholder="Endereço">
                                </div>
                            </div>

                        </div>
                        
                        <div class="form-row">
                            <div class="col" id="upFile">
                                <div class="form-group input-group text-center">
                                    <input name="image" accept="image/*" type="file" id="inputFile" class="inputFile"> <label class="file form-control" for="inputFile"> Selecione um arquivo </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <input id="btnModal" type="submit" value="Adicionar" class="btn btn-primary">
                        </div>
                    </fieldset>
                    </form>
                    <a id="editModal" href="#" class="noLink">Editar</a>
                    <a id="deleteModal" class="float-right" href="#" class="noLink">Excluir</a>
                </div>

            </div>
        </div>
    </div>
</div>
';
}
?>
