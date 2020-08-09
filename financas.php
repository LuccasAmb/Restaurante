<?php
include 'header.php';
include 'modal/financasDiarias.php';
?>

<div class="container-fluid">
	<div class="inserir-btn">
	<a class="btn btn-primary" id="addReceita" href="#" data-toggle="modal" data-target="#registerModal" role="button">Inserir Receita Diária</a>
	<a class="btn btn-primary" id="addDespesa" href="#" data-toggle="modal" data-target="#registerModal" role="button">Inserir Despesa Diária</a>
	</div>
	
	<div class="col">
		<div class="containerChart">
			<canvas id="receitaDesp"></canvas>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-6 col-md-6 sm-12 text-center">
				<div class="containerChart">
					<canvas id="despesa"></canvas>
				</div>
			</div>
			<div class="col col-lg-6 col-md-6 sm-12 text-center">
			<div class="containerChart">
					<canvas id="mensal"></canvas>

			</div>
				
			</div>
		
		</div>
	
	
	</div>

</div>
