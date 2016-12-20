<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6">
		<h2>Catálogos</h2>
		<hr>
	</div>
</div>
<?php
    require_once 'class/Catalogos.php';
    require_once 'class/Archivos.php';
    require_once 'class/Revistas.php';
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
			<div class="col-xs-12 col-md-4" style="text-align:center">
				<img src="files/catalogos/<?php echo $row['imagen_catalogo'];?>" class="img-thumbnail imgCatalogo"/>
				
			</div>
			<div class="col-xs-12 col-md-3" style="text-align: center">
				<button class="btn btn-warning comic" onclick="showEdition(<?php echo $row['id_catalogo'] ?>)"><i class="glyphicon glyphicon-pencil"></i> Editar</button>
				<br><br>
				<button class="btn btn-default comic" data-toggle="modal" data-target="#modal-cat-<?php echo $row['id_catalogo']; ?>"><i class=" glyphicon glyphicon-book"></i> Revistas</button>
			</div>	
		</div>
	</div>
</div>
<div class="row edicion-catalogo" id="cat-<?php echo $row['id_catalogo']?>">
	<br>
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6 edit-cat">
		<form action="WebMaster.php?modulo=catalogos" method="post" name="form-upCat" class="row" enctype="multipart/form-data">
			<div class="col-xs-12 col-md-6 edit-cat">
				<label>Nombre del Catálogo</label>
				<input type="text" id="nombre_catalogo" name="nombre_catalogo" class="form-control" placeholder="Nuevo Nombre" value="<?php echo $row['nombre_catalogo']; ?>" required onblur="validaExp(this,'alfaEsp')">
				<span class="miniNota"></span>
				<label>Descripción  del catálogo</label>
				<textarea id="descripcion_catalogo" name="descripcion_catalogo" class="form-control" placeholder="Nueva Descripcion" required onblur="validaExp(this,'alfaEsp')"><?php echo $row['descripcion_catalogo']; ?></textarea>
				<span class="miniNota"></span>
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
<!-- Modal -->
    <div class="modal fade" id="modal-cat-<?php echo $row['id_catalogo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabe<?php echo $row['id_catalogo']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabe<?php echo $row['id_catalogo']; ?>">Catálogo:<?php echo $row['nombre_catalogo'];?></h3>
                    <h4>&nbsp;&nbsp;&nbsp;Revistas Asociadas</h4>
                	<hr>
                    <div class="row" style="width:100%">
                    <?php
                    	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
                    	$revista = new Revistas($pdo);
                    	$rsRevista = $revista->getRevisByCatalogo($row['id_catalogo']);
                    	foreach ($rsRevista as $revi) {
                    ?>
                		<div class="col-xs-6 col-md-4 back-miniRevista">
                		<?php 
                		echo $revi['nombre_revista'];
                		if(strlen ($revi['nombre_revista']) <= 16){
                			echo "<br>";
                		}
                		?>

                		<br>
                		<img src="../user/<?php echo $revi['img_revista'];?>" class="img-thumbnail imgCatalogo">
                		<br>
                		No.<?php echo $revi['numero_revista'];?>
                		<br>
                		<a href="../user/<?php echo $revi['pdf_revista'];?>" class="btn btn-danger comic" target="_blank"><i class="glyphicon glyphicon-folder-open"></i> Ver</a>
                		</div>
                    <?php } ?>
                    </div>
                </div>
               

            </div>
        </div>
    </div>
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
        	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
            $catalogo = new Catalogos($pdo);
            $nombre = $_POST['nombre_catalogo'];
            $descripcion = $_POST['descripcion_catalogo'];
            $imagen = $_FILES['imagen_catalogo'];
            $id_catalogo = $_POST['id_catalogo'];
            $bolGuardo = 0;
            if($imagen["name"] == ""){
            	$imagen = "";
            	$bolGuardo = $catalogo->updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo);
            }else{
            	$cargar = new Archivos($imagen);
            	if($cargar->subirArchivo("files/catalogos/")){
            		echo "subio el archivo";
            		$bolGuardo = $catalogo->updateCatalogo($nombre,$descripcion,$imagen["name"],$id_catalogo);
            	}
            }
            
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
