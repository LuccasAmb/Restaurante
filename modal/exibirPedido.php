<?php
if(isset($userData)){
  echo'
<div class="modal fade" id="exibirPrato" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalTitle" class="modal-title">Informações do pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container text-center">
                    <div id="divModal"></div>


                </div>

            </div>
        </div>
    </div>
</div>
';
}
?>
