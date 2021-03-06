<style type="text/css">
    html { 
        overflow-y:scroll;
    }
</style>
<div class="row" style="width: 100%;">
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6">
        <h1 class="comic">Muestras</h1>
        <div class="row">
            <form name="formBuscaCat" action="TransactionsAdmin.php?modulo=buscaMuestra" method="post"  class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar muestra" name="busquedaMuestra" id="busquedaMuestra">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-md-4 col-sm-12">
                <button class="btn btn-success comic" data-toggle="modal" data-target="#modal-addMuestra" style="width: 100%">
                    <i class=" glyphicon glyphicon-plus"></i>
                    Agregar Muestra
                </button>
            </div>
        </div>
        <hr>
    </div>
</div>


<?php
//error_reporting(E_ALL); 
require_once 'class/login_mysql.php';
require_once 'class/ConexionBD.php';
require_once 'class/Archivos.php';
require_once 'class/Muestras.php';
$searchMuestra = "";
if(isset($_GET['searchMuestra'])){
$searchMuestra = $_GET['searchMuestra'];
}
$muestra = new Muestras();

$rs =  $muestra->buscarMuestra($searchMuestra);
foreach ($rs as $row) {
?>

<div class="row" style="width: 100%">
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6 catalogo">
        <div clas="row">
            <div class="col-xs-12 col-md-5">
                <!--Nombre-->
                <h4><?php echo $row['titulo']; ?></h5>
                    <!-- Descripcion -->
                    <h5><?php echo $row['descripcion']; ?></h5>
            </div>
            <div class="col-xs-12 col-md-4" style="text-align:center">
                <img src="../<?php echo $row['imagen'];?>" class="img-thumbnail imgCatalogo"/>
            </div>
            <div class="col-xs-12 col-md-3" style="text-align: center">
                <button class="btn btn-danger comic" onclick="showEdition(<?php echo $row['id_muestra'] ?>)"><i class="glyphicon glyphicon-pencil"></i> Editar</button>
                <br><br>
                <a class="btn btn-default comic" target="_blank" href="<?php echo "../".$row['documento'];?>">
                	<i class="glyphicon glyphicon-bookmark"></i>
                	Documento 
                </a>
                <br><br>
                <a style="color: red" class="btn btn-default comic"  href="TransactionsAdmin.php?modulo=eliminaMu&id=<?php echo $row['id_muestra'];?>">
                    <i class="glyphicon glyphicon-trash"></i> Eliminar
                </a>
            </div>  
        </div>
    </div>
</div>


<div class="row edicion-catalogo" id="cat-<?php echo $row['id_muestra']?>" style="width: 98%">
    <br>
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6 edit-cat">
        <form action="TransactionsAdmin.php?modulo=modificaMu" method="post" name="form-upMu" class="row" enctype="multipart/form-data">
            <div class="col-xs-12 col-md-6 edit-cat">
                <label>Nombre de la muestra</label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Nuevo Nombre" value="<?php echo $row['titulo']; ?>" required />
                <span class="miniNota"></span>
                <label>Descripción  de la muesta</label>
                <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Nueva Descripcion" required><?php echo $row['descripcion']; ?></textarea>
                <span class="miniNota"></span>
            </div>
            <div class="col-xs-12 col-md-6 edit-cat">
                <label>Imagen de la muestra</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
                <label>Documento de la muestra</label>
                <input type="file" id="documento" name="documento" class="form-control">
                <input type="hidden" id="id_muestra" name="id_muestra" value="<?php echo $row['id_muestra']?>">
                <br>
                <label>Activa</label>
                <input type="checkbox" id="activo" name="activo" class="form-control" <?php if($row['activo'] == 1){echo "checked";}?>>
                <br>
                <button type="submit" class="btn btn-warning comic"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
            </div>  
        </form>
    </div>
</div>
<br>
<?php } ?>
<!-- ***************** DIALOGS ***************************-->
<div class="modal fade" id="modal-addMuestra" tabindex="-1" role="dialog" aria-labelledby="labeladdMuestra">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="labeladdMuestra">
                    Agregar Muestra
                </h3>
            </div>
            <hr>
            <form method="post" action="TransactionsAdmin.php?modulo=registrarMuestra" name="formAddMu" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" align="center">
                        <label>
                            Nombre de la muestra
                        </label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nombre de la muestra">
                        <br>
                        <label>Descripcion del catálogo</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion de la muestra"></textarea>
                        <br>
                        <label>Imagen de la muestra</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                        <br>
                        <label>Documento de la muestra</label>
                        <input type="file" name="documento" id="documento" class="form-control">
                        <br>
                        <label>Activa</label>
                        <input type="checkbox" id="activo" name="activo" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-warning comic">
                            <i class="glyphicon glyphicon-floppy-disk"></i>
                            Guardar
                        </button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>