<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6">
		<h2>Catálogos</h2>
		<hr>
	</div>
</div>
<?php
	require_once '../controladores/datos/ConexionBD.php';
	require_once 'class/Catalogos.php';
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	$query = "SELECT * FROM catalogo";
	$ejecuta = $pdo->prepare($query);
	$ejecuta->execute();
	$rs =  $ejecuta->fetchAll();
	foreach ($rs as $row) {
?>
<div class="row" style="width: 100%">
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
				<button class="btn btn-warning comic" onclick="showEdition(<?php echo $row['id_catalogo'] ?>)"><i class="glyphicon glyphicon-pencil"></i> Editar</button>
				<br><br>
				<button class="btn btn-default comic"><i class=" glyphicon glyphicon-book"></i> Revistas</button>
			</div>	
		</div>
	</div>
</div>
<div class="row edicion-catalogo" id="cat-<?php echo $row['id_catalogo']?>">
	<br>
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6 edit-cat">
		<form action="WebMaster.php?modulo=catalogos" method="post" name="form-upCat" class="row">
			<div class="col-xs-12 col-md-6 edit-cat">
				<label>Nombre del Catálogo</label>
				<input type="text" id="nombre_catalogo" name="nombre_catalogo" class="form-control" placeholder="Nuevo Nombre" value="<?php echo $row['nombre_catalogo']; ?>">
				<label>Descripción  del catálogo</label>
				<textarea id="descripcion_catalogo" name="descripcion_catalogo" class="form-control" placeholder="Nuevo Descripcion"><?php echo $row['descripcion_catalogo']; ?>
				</textarea>
			</div>
			<div class="col-xs-12 col-md-6 edit-cat">
				<label>Imagen del Catálogo</label>
				<input type="file" id="imagen_catalogo" name="imagen_catalogo" class="form-control">
				<input type="hidden" id="id_catalogo" name="id_catalogo" value="<?php echo $row['id_catalogo']?>">
				<input type="hidden" name="funcion" id="funcion" value="guardar">
				<br>
				<button type="submit" class="btn btn-danger comic"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
			</div>	
		</form>
	</div>
</div>
<br>
<?php } ?>

<script type="text/javascript">
	function showEdition(who){
		$("#cat-"+who).slideToggle(400);
	}
</script>

<?php 
    $funcion = $_POST['funcion'];
        if(!isset($funcion)){
            $funcion = "";
        }else if($funcion == "guardar"){
        	error_log(1);
        	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
            $catalogo = new Catalogos($pdo);
            $nombre = $_POST['nombre_catalogo'];
            $descripcion = $_POST['descripcion_catalogo'];
            $imagen = $_POST['imagen_catalogo'];
            $id_catalogo = $_POST['id_catalogo'];
            $bolGuardo = $catalogo->updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo);
            if($bolGuardo == 1){
            ?>
                <form method="post" action="WebMaster.php?modulo=catalogos" id="form-rload-cat"></form>
                <script type="text/javascript">
                    document.getElementById("form-rload-cat").submit();
                </script>
            <?php    
            }
            
        }
 ?>
