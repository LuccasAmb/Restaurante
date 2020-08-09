<?php
if(isset($userData)){
  echo'
<div class="modal fade" id="confirmCart" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalconfirmcartTitle" class="modal-title">Confirmar carrinho</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container text-center" style="display: none;" id="deleteModalCart">
                    <div class="alert alert-danger" role="alert">Deseja excluir os pedidos atuais?</div>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Voltar</button>
                    <button type="button" id="deleteCart" class="btn btn-outline-danger cartfunction"  estado="delete">Excluir</button>
                </div>

                <div class="container text-center" style="display: none;" id="sendModalCart">
                    <div class="alert alert-success" role="alert">Deseja enviar o pedido atual?</div>
                    <div id="cartList"></div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Voltar</button>
                    <button type="button" id="registerCart" class="btn btn-outline-primary cartfunction"  estado="enviado">Enviar</button>
                </div>

            </div>
        </div>
    </div>
</div>
';
}
?>
