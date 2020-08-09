<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
    echo'
<div class="modal fade" id="confirmPass" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Confirmar senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="container mw-100">

                        <form id="formModal" class="md-form text-center" name="editProduct" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <input id="id" type="hidden" name="id">
                        <input type="hidden" name="tab" value="'.$page.'">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>N</b></span>
                                </div>
                                <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome do cargo">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>S</b></span>
                                </div>
                                <input id="sal" name="sal" type="number" class="form-control" placeholder="Salário">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>D</b></span>
                                </div>

                                <select id="selectOpt" name="idDepart" class="custom-select">
                                <option selected>Selecione o departamento</option>';
    
    $stmt = $conn->prepare("SELECT * FROM departamentos");
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        echo '<option value="'.$row["IDDepart"].'">'.$row["Nome"].'</option>';
    };

    echo '</select>
                            </div>
                            <div class="form-group text-center">
                                <input id="btnModal" type="submit" value="Adicionar" class="btn login_btn">
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
';

}

?>
