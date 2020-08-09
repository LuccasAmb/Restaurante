<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
  echo'
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Adicionar um produto</h5>
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
                                    <input id="nome" onblur="validar(nome)" name="nome" type="text" class="form-control" placeholder="Nome do produto">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="cod">Cód. de Barra:</label>
                                    <input id="cod" onblur="validar(cod)" name="cod" type="text" class="form-control" placeholder="Cód. de Barra">
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                        
                            <div class="col">
                                <div class="form-group">
                                    <label for="qtd">Quantidade:</label>
                                    <input id="qtd" onblur="validar(qtd)" name="qtd" type="number" min="0" class="form-control" placeholder="Quantidade">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="medida">Medida:</label><select id="medida" name="medida" class="custom-select"></select>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="dataVal">Data de Validade:</label>
                                    <input id="dataVal" onblur="validar(dataVal)" name="dataVal" type="date" class="form-control" min="'. date("Y-m-d").'" placeholder="Data de Validade">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="dataFab">Data de Fabricação:</label>
                                    <input id="dataFab" onblur="validar(dataFab)" name="dataFab" type="date" class="form-control" max="'. date("Y-m-d").'" placeholder="Data de Fabricação">
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-row">
                        
                            <div class="col">
                                <div class="form-group">
                                    <label>Fornecedor:</label>
                                    <select id="idForn" onblur="validar(idForn)" name="idForn" class="custom-select"></select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label">Categoria:</label><a id="addCat" class="noLink" href="#"> + Nova</a>
                                    <input id="txtCat" name="txtCat" placeholder="Categoria" type="text" class="form-control">
                                    <select id="categoria" onblur="validar(categoria)" name="categoria" class="custom-select"></select>
                                </div>
                            </div>

                        </div>
                        
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
