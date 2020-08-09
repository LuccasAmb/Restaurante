<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
  echo'
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Adicionar um prato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<span id="msg-error"></span>
			
                <div class="container">

                    <form id="formModal" class="md-form" action="php/register.php" method="POST" enctype="multipart/form-data">
                    <fieldset id="formField" disabled="disabled">
                        <input type="hidden" name="tab" value="'.$page.'">
                        <input type="hidden" id="crud" name="crud" value="insert">
                        <input id="id" type="hidden", name="id">
                        <div class="img-container">
                            <img id="image" src="img/layout/null.png" alt="Picture">
                        </div>
                        <div id="cancelImg" class="text-center mb-4"><a href="#" class="noLink">Cancelar imagem</a></div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input id="nome" onblur="validar(nome)" name="nome" type="text" class="form-control" placeholder="Nome do prato">
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="preco">Preço:</label>
                                    <input id="preco" onblur="validar(preco)" name="preco" type="text" class="form-control" placeholder="Preço">
                                </div>
                            </div>
                            

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="desc">Descrição:</label>
                                    <textarea class="form-control" onblur="validar(desc)" rows="5" name="desc" id="desc" placeholder="Descrição"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="divIng">

                            <div class="ingredientes">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ingrediente:<select name="ingrediente[]" class="custom-select ingrediente"></select></label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Quantidade:<input onblur="validar(nome)" name="qtd[]" min="0" type="number" class="form-control qtd" placeholder="Quantidade"></label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Medida:<select name="medida[]" class="custom-select medida"></select></label>
                                        </div>
                                    </div>
                                    <a class="float-right my-auto autoDelete" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>

                        <div class="form-row"><a class="noLink mb-3" id="addIng" href="#">Adicionar ingrediente</a></div>

                        
                        
                        <div class="form-row">
                            <div class="col" id="upFile">
                                <div class="form-group text-center">
                                    <input accept="image/*" type="file" id="inputFile" class="inputFile"> <label class="file form-control" for="inputFile"> Selecione um arquivo </label>
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
