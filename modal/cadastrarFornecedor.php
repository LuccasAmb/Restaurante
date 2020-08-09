<?php
if(isset($userData) && $userData["Nivel"] == "admin"){
    echo'
<div class="modal fade" id="registerModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Registrar fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<span id="msg-error"></span>
				
                <div class="container">

                    <div class="container mw-100">

                        <form id="formModal" class="md-form formModal" name="editProduct" action="php/register.php" method="POST" enctype="multipart/form-data">
                        <fieldset id="formField" disabled="disabled">
                        <input id="id" type="hidden" name="id">
                        <input type="hidden" id="crud" name="crud" value="insert">
                        <input type="hidden" name="tab" value="'.$page.'">
                        <div class="img-container">
                            <img id="image" src="img/layout/null.png" alt="Picture">
                        </div>
                        <div id="cancelImg" class="text-center mb-4"><a href="#" class="noLink">Cancelar imagem</a></div>
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input id="nome" onblur="validar(nome)" name="nome" type="text" class="form-control" placeholder="Nome do fornecedor">
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tel">Telefone:</label>
                                        <input id="tel" onblur="validar(tel)" name="tel" minlength="11" maxlength="11" type="text" class="form-control" placeholder="Telefone">
                                    </div>
                                </div>
                                    
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input id="email" onblur="validar(email)" name="email" type="email" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="end">Endereço:</label>
                                        <input id="end" onblur="validar(end)" name="end" type="text" class="form-control" placeholder="Endereço">
                                    </div>
                                </div>
                            
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cep">CEP:</label>
                                        <input id="cep" onblur="validar(cep)" name="cep" type="text" minlength="8" maxlength="8" class="form-control" placeholder="CEP">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="prazo">Prazo:</label>
                                        <input id="prazo" onblur="validar(prazo)" name="prazo" type="text" class="form-control" placeholder="Prazo">
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cnpj">CNPJ:</label>
                                        <input id="cnpj" onblur="validar(cnpj)" name="cnpj" minlength="14" maxlength="14" type="text" class="form-control" placeholder="CPNJ">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row justify-content-center"><label>Formas de Pagamento:</label></div>
                                
                            <div class="form-row justify-content-center">
                            
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pag[]" value="dinheiro" id="dinheiro">
                                        <label class="form-check-label" for="dinheiro">Dinheiro</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pag[]" value="credito" id="credito">
                                        <label class="form-check-label" for="credito">Cartão de Crédito</label>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-row justify-content-center">
                                
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pag[]" value="debito" id="debito">
                                        <label class="form-check-label" for="debito">Cartão de Débito</label>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pag[]" value="boleto" id="boleto">
                                        <label class="form-check-label" for="boleto">Boleto Bancário</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row justify-content-center">
                            
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pag[]" value="cheque" id="cheque">
                                        <label class="form-check-label" for="cheque">Cheque</label>
                                    </div>
                                </div>
                                    
                            </div>
                            
                            <div class="form-row justify-content-center"><label for="obs">Observações:</label></div>
                            <div class="form-row">
                                <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
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
                         <a id="editModal" href="#" class="noLink">Editar</a>
                         <a id="deleteModal" class="float-right" href="#" class="noLink">Excluir</a>
                         </fieldset>
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
