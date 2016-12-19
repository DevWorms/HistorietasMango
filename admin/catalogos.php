<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6">
		<<h2>Catálogos</h2>
		<hr>
	</div>
</div>
<?php
	require_once '../controladores/datos/ConexionBD.php';
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	$query = "SELECT * FROM catalogo";
	$ejecuta = $pdo->prepare($query);
	$ejecuta->execute();
	$rs =  $ejecuta->fetchAll();
	foreach ($rs as $row) {
?>
<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6 catalogo">
		<div clas="row">
			<div class="col-xs-12 col-md-5">
				<!--Nombre-->
				<h4><?php echo $row['nombre_catalogo']; ?></h5>
				<!-- Descripcion -->
				<h5><?php echo $row['descripcion_catalogo']; ?></h5>
			</div>
			<div class="col-xs-12 col-md-4">
				<img src="files/catalogos/<?php echo $row['imagen_catalogo'];?>" class="img-thumbnail imgCatalogo"/>
			</div>
			<div class="col-xs-12 col-md-3" style="text-align: center">
				<button class="btn btn-warning comic"><i class="glyphicon glyphicon-pencil"></i> Editar</button>
				<br><br>
				<button class="btn btn-default comic"><i class=" glyphicon glyphicon-book"></i> Revistas</button>
			</div>	
		</div>
	</div>
</div>
<div class="row" id="cat<?php echo $row['id_catalogo']?>">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6">
		Formulario modificar
	</div>
	
</div>
<br>
<?php } ?>
