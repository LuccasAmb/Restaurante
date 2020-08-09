<?php

  echo'
<div class="modal fade" id="exibirPrato" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Informações do prato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container text-center">
                    <img id="modalImg" class="img-fluid" src="img/pratos/null.png">
                    <h3 class="pTitle" id="nome"></h3>
                    <p class="money" id="preco"></h3>
                    <p class="desc" id="desc"></h3>

                    <form id="formModal" class="md-form formModal" action="php/cart.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="add" name="action">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="idCart" name="idCart">
                        <input type="hidden" id="tab" name="tab">
                        <input type="hidden" id="idItens" name="idItens">
                        <div class="form-row mb-3">
                            <div class="col">
                            <label for="qtd">Quantidade:</label>
                                <div class="input-group number-spinner">
                                    <span class="input-group-btn">
                                        <a class="btn border-primary rounded-circle" data-dir="dwn"><i class="fa fa-minus text-primary" aria-hidden="true"></i></a>
                                    </span>
                                    <input type="number" value="0" min="0" id="qtd" name="qtd" class="h-100 mx-1 form-control text-center">
                                    <span class="input-group-btn">
                                        <a class="btn border-primary rounded-circle" data-dir="up"><i class="fa fa-plus text-primary" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="obs">Observações:</label>
                                    <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" id="btnCart" value="Adicionar aos pedidos" class="btn btn-primary">
                        </div>
                        <a id="deleteModal" class="float-right" href="#" class="noLink">Excluir</a>
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
';
