<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
  echo'
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Adicionar uma mesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<span id="msg-error"></span>
				
                <div class="container">

                    <form id="formModal" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <fieldset id="formField" disabled="disabled">
                        <input type="hidden" id="formTab" name="tab" value="mesas">
                        <input type="hidden" id="crud" name="crud" value="insert">
                        <input id="id" type="hidden" name="id">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input id="nome" onblur="validar(nome)" name="nome" type="text" class="form-control" placeholder="Nome da mesa">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ip">IP:</label>
                                    <input id="ip" onblur="validar(ip)" name="ip" type="text" minlength="4" maxlength="12" class="form-control" placeholder="IP do Dispositivo">
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
