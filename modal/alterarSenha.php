<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
  echo'
<div class="modal fade" id="alterarSenha" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Alterar senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <form id="formSenha" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <input class="id" type="hidden" name="id">

                            <div class="col">
                                <div class="form-group">
                                    <label for="pass">Senha atual:</label>
                                    <input id="pass" name="pass" type="password" class="form-control" placeholder="Senha atual">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="newPass">Nova senha:</label>
                                    <input id="newPass" name="newPass" type="password" class="form-control" placeholder="Nova senha">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="newPass2">Confirmar senha:</label>
                                    <input id="newPass2" name="newPass2" type="password" class="form-control" placeholder="Confirmar senha">
                                </div>
                            </div>
                            



                        <div class="form-group text-center">
                            <input id="btnModall" type="submit" value="Adicionar" class="btn login_btn">
                        </div>
                    </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
';
}
?>
