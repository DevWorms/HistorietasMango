<style type="text/css">
    html { 
        overflow-y:scroll;
    }
</style>
<div class="row" style="width: 100%;">
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6">
        <h1 class="comic">Catálogos</h1>
        <div class="row">
            <form name="formBuscaCat" action="TransactionsAdmin.php?modulo=buscarCat" method="post"  class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar Catálogo" name="busquedaCat" id="busquedaCat">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-md-4 col-sm-12">
                <button class="btn btn-success comic" data-toggle="modal" data-target="#modal-addCatalogo" style="width: 100%">
                    <i class=" glyphicon glyphicon-plus"></i>
                    Agregar Catálogo
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
require_once 'class/Catalogos.php';
require_once 'class/Archivos.php';
require_once 'class/Revistas.php';
$searchCat = "";
if(isset($_GET['searchCat'])){
$searchCat = $_GET['searchCat'];
}
$catalogo = new Catalogos();

$rs =  $catalogo->buscarCatalogo($searchCat);
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
        <form action="TransactionsAdmin.php?modulo=modificaCat" method="post" name="form-upCat" class="row" enctype="multipart/form-data">
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
                <form action="TransactionsAdmin.php?modulo=saveRevistaCat" name="form-activa"  id="form-activa-<?php echo $row['id_catalogo']?>" style="float:right" method="post">
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
                    $revista = new Revistas();
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
<!-- ***************** DIALOGS ***************************-->
<div class="modal fade" id="modal-addCatalogo" tabindex="-1" role="dialog" aria-labelledby="labelAddCatalogo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="labelAddCatalogo">
                    Agregar Catálogo
                </h3>
            </div>
            <hr>
            <form method="post" action="TransactionsAdmin.php?modulo=registraCat" name="formAddCat" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" align="center">
                        <label>
                            Nombre del catalogo
                        </label>
                        <input type="text" name="nombre_catalogo" id="nombre_catalogo" class="form-control" placeholder="Nombre del catálogo">
                        <br>
                        <label>Descripcion del catálogo</label>
                        <textarea name="descripcion_catalogo" id="descripcion_catalogo" class="form-control" placeholder="Descripcion del catálogo"></textarea>
                        <br>
                        <label>Imagen del Catálogo</label>
                        <input type="file" name="imagen_catalogo" id="imagen_catalogo" class="form-control">
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