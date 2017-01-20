<style type="text/css">
    html { 
  overflow-y:scroll;
}
</style>
<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6">
		<h1 class="comic">Catálogos</h1>
		<hr>
	</div>
</div>


<?php
    require_once 'class/Catalogos.php';
    require_once 'class/Archivos.php';
    require_once 'class/Revistas.php';
    //creo este pdo que usare para pasar a la clase ya que tambien lo usuare aqui para la vista
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
				<img src="../user/<?php echo $row['imagen_catalogo'];?>" class="img-thumbnail imgCatalogo"/>
			</div>
			<div class="col-xs-12 col-md-3" style="text-align: center">
				<button class="btn btn-danger comic" onclick="showEdition(<?php echo $row['id_catalogo'] ?>)"><i class="glyphicon glyphicon-pencil"></i> Editar</button>
				<br><br>
				<button class="btn btn-default comic" data-toggle="modal" data-target="#modal-cat-<?php echo $row['id_catalogo']; ?>"><i class=" glyphicon glyphicon-book"></i> Revistas</button>
			</div>	
		</div>
	</div>
</div>


<div class="row edicion-catalogo" id="cat-<?php echo $row['id_catalogo']?>" style="width: 98%">
	<br>
	<div class="col-xs-12 col-md-3"></div>
	<div class="col-xs-12 col-md-6 edit-cat">
		<form action="WebMaster.php?modulo=catalogos" method="post" name="form-upCat" class="row" enctype="multipart/form-data">
			<div class="col-xs-12 col-md-6 edit-cat">
				<label>Nombre del Catálogo</label>
				<input type="text" id="nombre_catalogo" name="nombre_catalogo" class="form-control" placeholder="Nuevo Nombre" value="<?php echo $row['nombre_catalogo']; ?>" required />
				<span class="miniNota"></span>
				<label>Descripción  del catálogo</label>
				<textarea id="descripcion_catalogo" name="descripcion_catalogo" class="form-control" placeholder="Nueva Descripcion" required><?php echo $row['descripcion_catalogo']; ?></textarea>
				<span class="miniNota"></span>
			</div>
			<div class="col-xs-12 col-md-6 edit-cat">
				<label>Imagen del Catálogo</label>
				<input type="file" id="imagen_catalogo" name="imagen_catalogo" class="form-control">
				<input type="hidden" id="id_catalogo" name="id_catalogo" value="<?php echo $row['id_catalogo']?>">
				<input type="hidden" name="funcion" id="funcion" value="guardar">
				<br>
				<button type="submit" class="btn btn-warning comic"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
			</div>	
		</form>
	</div>
</div>
<br>
<!-- Modal -->
    <div class="modal fade" id="modal-cat-<?php echo $row['id_catalogo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabe<?php echo $row['id_catalogo']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabe<?php echo $row['id_catalogo']; ?>">
                    Catálogo: <?php echo $row['nombre_catalogo'];?></h3>
                    <span style="font-size:110%">&nbsp;&nbsp;&nbsp;Revistas Asociadas</span>
                    <form action="WebMaster.php?modulo=catalogos" name="form-activa"  id="form-activa-<?php echo $row['id_catalogo']?>" style="float:right" method="post">
                        <input type="hidden" name="activadas" id="activadas">
                        <input type="hidden" name="desactivadas" id="desactivadas">
                        <input type="hidden" name="eliminadas" id="eliminadas">
                        <input type="hidden" name="funcion" id="funcion" value="guardar_quick_revista"> 
                        <button type="submit" class="btn btn-warning comic" title="Guardar">
                             <i class="glyphicon glyphicon-floppy-disk"></i>
                        </button>
                    </form>
                    <button type="button" class="btn btn-danger comic" style="float:right;margin-right: 3px" data-toggle="tooltip" data-placement="bottom" title="Cancelar" onclick="cancelChanges(<?php echo $row['id_catalogo']; ?>)">
                         <i class="glyphicon glyphicon-ban-circle"></i>
                    </button>
                    <form action="WebMaster.php?modulo=revistas" name="form-nueva-revista" method="post" style="float:right;margin-right: 3px">
                    <input type="hidden" id="que_catalogo" name="que_catalogo" value="<?php echo $row['id_catalogo'];?>">
                       <button type="submit" class="btn btn-success comic"  data-toggle="tooltip" data-placement="bottom" title="Nueva Revista">
                                <i class="glyphicon glyphicon-plus"></i>
                        </button> 
                    </form>
                    

                	<hr>
                    <div class="row" style="width:100%">
                    <?php
                    	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
                    	$revista = new Revistas($pdo);
                    	$rsRevista = $revista->getRevisByCatalogo($row['id_catalogo']);
                    	foreach ($rsRevista as $revi) {?>
                		<div class="col-xs-6 col-md-3 back-miniRevista">
                    		<?php 
                    		echo $revi['nombre_revista'];
                    		if(strlen ($revi['nombre_revista']) <= 16){
                    			echo "<br>";
                    		}?>
                    		<br>
                    		<img src="<?php echo "../user/".$revi['img_revista'];?>" class="img-thumbnail imgCatalogo">
                    		<br>
                    		No.<?php echo $revi['numero_revista'];?>
                    		<br>
                    		<a id="rview-<?php echo $revi['id_revista']?>" href="../user/<?php echo $revi['pdf_revista'];?>" class="btn btn-warning comic" target="_blank"><i class="glyphicon glyphicon-folder-open"></i> </a>
                            <button id="rdel-<?php echo $revi['id_revista']?>" type="submit" class="btn btn-danger comic" onclick="pastDeleted(<?php echo $row['id_catalogo'].','.$revi['id_revista'];?>,this)">
                                <i class=" glyphicon glyphicon-trash"></i>
                            </button>
                            <br> 
                            <span class="comic">Inactivo/Activo</span>
                            <br>
                            <label class="switch">
                              <input type="checkbox" id="rch-<?php echo $revi['id_revista'].'"'; if($revi['activo']==1){ echo " checked";}?> onclick="pastActivated(<?php echo $row['id_catalogo'].','.$revi['id_revista'];?>,this)">
                              <div class="slider round"></div>
                            </label>
                		</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<form method="post" action="WebMaster.php?modulo=catalogos" id="form-rload-cat"></form>
<script type="text/javascript">
	function showEdition(who){
		$("#cat-"+who).slideToggle(400);
	}

    function pastActivated(id_catalogo,id_revista,quien){
        // al dar click en lso toggle button revisa si estan activos o inactivos y lso agregara al hidden correspondiente
        if($(quien).is(":checked")){
            //obtengo valor anterior
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='activadas']").val();
            //concatetno el nuevo
            idsRevistas += "'"+ id_revista + "',";
            //agrego
            $("#form-activa-"+id_catalogo+ " input[name='activadas']").val(idsRevistas);
        }else{
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val();
            idsRevistas += "'"+id_revista + "',";
            $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val(idsRevistas);
        }

    }
    function pastDeleted(id_catalogo,id_revista, quien){
        //primero pregunto
        if(confirm("Estas seguro de querer eliminar esta revista?")){
            //obtengo el valor anterior
            var idsRevistas = $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val();
            //guardo el nuevo valor
            idsRevistas += "'"+id_revista + "',";
            //aplico estilso y deshabilito funciones que indica que sera eliminado
            $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val(idsRevistas);
            $(quien).parent("div").css({
                'opacity': '0.45',
                'background-color': '#F4EBEB',
                'border-radius':'5px'
            });
            $(quien).attr("disabled",true); 
            $("#rch-"+id_revista).attr("disabled",true);
            $("#rview-"+id_revista).attr("disabled",true);
        }
        
    }

    function cancelChanges(id_catalogo){
        if(confirm("Esta seguro que quiere deshacer todos los cambos ?")){
            var eliminadas = $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val();
            var activadas = $("#form-activa-"+id_catalogo+ " input[name='activadas']").val();
            var desactivadas = $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val();

            // hacemos un replace de las comillas asi las mando para la bd para aqui sin comillas
            activadas = activadas.replace(/'/g, "");
            desactivadas = desactivadas.replace(/'/g, "");
            eliminadas = eliminadas.replace(/'/g, "");


            //separo los valores id_revista
            activadas = activadas.split(",");
            desactivadas = desactivadas.split(",");
            var arrBack = eliminadas.split(",");

            // obtengo los id guardados en el hidden de eliminadas y revierto cambios
            for(var cont =0 ;cont < arrBack.length; cont++){
                if(arrBack[cont] != ""){
                    $("#rdel-"+arrBack[cont]).attr("disabled",false); 
                    $("#rch-"+arrBack[cont]).attr("disabled",false);
                    $("#rview-"+arrBack[cont]).attr("disabled",false);
                    $("#rdel-"+arrBack[cont]).parent("div").css({
                        'opacity': '1',
                        'background-color': '#FFF',
                        'border-radius':'0px'
                    });   
                }
                
            }
            // ahora revierto el botton toggle si se guardaron como activadas regresamso a desactivar y viceversa

            for(var i =0 ;i < activadas.length; i++){
                if(activadas[i] != ""){
                 $("#rch-"+activadas[i]).prop("checked",false);   
                }
                
            }

            for(var i =0 ;i < desactivadas.length; i++){
                if(desactivadas[i] != ""){
                  $("#rch-"+desactivadas[i]).prop("checked",true);  
                }
                
            }
                

            $("#form-activa-"+id_catalogo+ " input[name='eliminadas']").val("");
            $("#form-activa-"+id_catalogo+ " input[name='activadas']").val("");
            $("#form-activa-"+id_catalogo+ " input[name='desactivadas']").val("");
        }
    }
</script>

<?php 
//  para hacelo mas ligero ocupo la propia pagina para ls escripts que ejecutan los 
//  metodos de las clases por medio de un parametro llamaado funcion para saber que accion se hace
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

            $bolGuardo = $catalogo->updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo);

            if($bolGuardo == 1){
            ?>
                
                <script type="text/javascript">
                    alert("Se actualizó el catálogo correctamente");
                    document.getElementById("form-rload-cat").submit();
                </script>
            <?php    
            }
            
        }else if($funcion== "guardar_quick_revista"){
            $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
            $saveRevista = new Revistas($pdo);
            $activadas = $_POST['activadas'];
            $desactivadas = $_POST['desactivadas'];
            $eliminadas = $_POST['eliminadas'];
            $guardo = $saveRevista->saveCambiosDinamicos($activadas,$desactivadas,$eliminadas);
            if($guardo == 3){
            ?>
                <script type="text/javascript">
                    alert("Se Se actualizaron las revistas correctamente");
                    document.getElementById("form-rload-cat").submit();
                </script>
            <?php
            }
        }
 ?>
