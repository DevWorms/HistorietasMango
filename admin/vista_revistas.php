<form action="TransactionsAdmin.php?modulo=saverevistas" method="post" name="form-saveRevista" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-12 col-md-4" style="text-align: center">
            <h1 class="comic">Nueva Revista</h1>
            <input type="text" id="nombre_revista" name="nombre_revista" required placeholder="Nombre de la aevista" class="form-control" onblur="validaExp(this, 'alfaEsp')" />
            <span class="miniNota"></span>
            <br>
            <textarea type="text" id="info_revista" name="info_revista" placeholder="Información de la revista" class="form-control" rows="4" required onblur="validaExp(this, 'alfaEsp')" ></textarea>
            <span class="miniNota"></span>
            <br>
            <select class="form-control" id="catalogo" name="catalogo" style="font-weight: bold" required>
                <?php 
                require_once 'class/login_mysql.php';
                require_once 'class/ConexionBD.php';
                require_once 'class/Catalogos.php';
                $whichc_catalogo = "";
                if(isset($_POST['que_catalogo'])){
                $whichc_catalogo = $_POST['que_catalogo'];
                }
                $catalogo = new Catalogos();
                $rs = $catalogo->getNombre($whichc_catalogo);
                foreach ($rs as $row) {
                ?>
                <option value=<?php echo '"'.$row['id_catalogo'].'"'; if($whichc_catalogo == $row['id_catalogo']){echo " selected";}?>>
                        <?php echo $row['nombre_catalogo'];?>
            </option>
            <?php }?>
        </select>
        <br>
        <input type="text" id="numero_revista" name="numero_revista" placeholder="Número revista" class="form-control" required onblur="validaExp(this, 'num')" />
        <span class="miniNota"></span>
        <br>
        <h4 class="comic">Activar</h4>
        <input type="checkbox" id="activo" name="activo" class="form-control" placeholder="Activar" />
    </div>
    <div class="col-xs-12 col-md-4" style="text-align:center">
        <h4><br></h4>
        <h4 class="comic">Imagen</h4>
        <input type="file" class="form-control" id="imagen_revista" name="imagen_revista" required>
        <h4 class="comic">PDF/Archivo</h4>
        <input type="file" class="form-control" id="documento_revista" name="documento_revista" required>
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
