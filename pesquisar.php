<?php

echo '
<div class="row justify-content-center my-3 mx-3">
        <form id="search" action="php/search.php" class="form-inline my-2 my-lg-0" action="#">
            <div class="input-group form-group">
                <input type="hidden" name="tab" method="POST" value='.$page.'>
                <input class="form-control" type="text" name="search" placeholder="Pesquisar" method="POST" enctype="multipart/form-data">
            </div>
        </form>
</div>
';
    
?>