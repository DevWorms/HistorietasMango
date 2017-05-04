<?php
    require_once 'class/login_mysql.php';
    require_once 'class/ConexionBD.php';
    require_once 'class/Catalogos.php';
    require_once 'class/Revistas.php';
    if(isset($_GET['id_revista'])){
        $id_revista = $_GET['id_revista'];
        $encuentra = new Revistas();
        $revista = $encuentra->getRevista($id_revista);
?>
<form action="TransactionsAdmin.php?modulo=modificaRevista" method="post" name="form-saveRevista" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-12 col-md-4" style="text-align: center">
            <h1 class="comic"><?php echo $revista->nombre_revista;?></h1>
            <input type="hidden" name="id_revista" id="id_revista" value="<?php echo $id_revista;?>">
            <input type="hidden" name="id_catalogo" id="id_catalogo" value="<?php echo $revista->id_catalogo;?>">
            <input type="text" id="nombre_revista" name="nombre_revista" required placeholder="Nombre de la aevista" class="form-control" value="<?php echo $revista->nombre_revista;?>"/>
            <span class="miniNota"></span>
            <br>
            <textarea type="text" id="info_revista" name="info_revista" placeholder="Información de la revista" class="form-control" rows="4" required  ><?php echo $revista->info_revista;?></textarea>
            <span class="miniNota"></span>
            <br>
                <?php 
                $cat = new Catalogos();
                $id_catalogo = $revista->id_catalogo;
                $rs = $cat->getNombre($id_catalogo);
                foreach ($rs as $row) {
                    if($row['id_catalogo'] == $id_catalogo){
                ?>

                <h3>Catalogo: <?php echo $row['nombre_catalogo'];?></h3>            
            <?php } } ?>
        <br>
        <input type="text" id="numero_revista" name="numero_revista" placeholder="Número revista" class="form-control" required  value="<?php echo $revista->numero_revista;?>"/>
        <span class="miniNota"></span>
        <br>
        <h4 class="comic">Activar</h4>
        <input type="checkbox" id="activo" name="activo" class="form-control" placeholder="Activar" <?php if($revista->activo == 1){echo "checked";}?>/>
    </div>
    <div class="col-xs-12 col-md-4" style="text-align:center">
        <h4><br></h4>
        <h4 class="comic">Imagen</h4>
        <img src="<?php echo "../user/".$revista->img_revista;?>" class="img-revista">
        <br><br>
        <input type="file" class="form-control" id="imagen_revista" name="imagen_revista">
        <h4 class="comic">PDF/Archivo</h4>
        <input type="file" class="form-control" id="documento_revista" name="documento_revista">
        <br>
        <a href="<?php echo "../user/".$revista->pdf_revista;?>" target="_blank" style="font-size: 18px">
            <i class="glyphicon glyphicon-eye-open"></i>
            Ver documento actual
        </a>
        <br><br>
        <span id="previewImg"></span>
        <br><br>
        <button class="btn btn-lg btn-warning comic" type="submit" >
            <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
        </button>
    </div>
</div>
</form> 
<br><br>
<div class="row">
    <div class="col-xs-12 col-md-8"></div>
    <div class="col-xs-12 col-md-3">
    </div>
</div>
<?php } ?>