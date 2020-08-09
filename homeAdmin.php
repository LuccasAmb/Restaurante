<?php
include 'header.php';
?>
</div>
<div class="container-fluid align-content-center">

	<div class="col-12">
		<nav class="navbar barTitle">
			<h5>Dashboard</h5>
			<div class="icons">
				<a href="#"><i class="fas fa-cog"></i></a>
				<a href="#"><i class="fas fa-question-circle"></i></a>
			</div>
		</nav>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-6 col-md-6 sm-12 text-center">
				<div class="containerChart">
					<canvas id="myChart"></canvas>
				</div>
			</div>
			<div class="col col-lg-6 col-md-6 sm-12 text-center">
				<div class="containerChart">
					<canvas id="myOtherChart"></canvas>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col col-lg-6 col-md-6 sm-12 text-center">
				<div class="containerChart">
					<canvas id="myThirdChart"></canvas>
				</div>
			</div>


			<div class="col col-lg-6 col-md-6 sm-12 text-center">
				<div class="containerChart">
					<h2>Lista de Tarefas</h2>
					<p><em> Clique e arraste para reordenar, clique duplo para riscar um item. </em></p>

					<form id="toDoList">
						<input type="text" name="ListItem" id="ListItem">
						<input type="submit" class="btn btn-primary" value="Adicionar">  
					</form>

					<ol id="ToDoListItems"></ol>



				</div>
			</div>




		</div>
	</div>
</div>

</body>

</html>