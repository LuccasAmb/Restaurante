<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
echo' 
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Finanças</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<span id="msg-error"></span>
                <div class="container text-center">

                    <form id="formModal" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="tipo" name="tipo">
                        <input type="hidden" id="tab" name="tab" value="financas">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="dia">Data:</label>
                                    <input id="dia" name="dia" type="date" class="form-control" placeholder="Data">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="val">Valor:</label>
                                    <input id="val" name="val" type="text" class="form-control" placeholder="Valor">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input id="btnModal" type="submit" value="Adicionar" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
';
}
?>
