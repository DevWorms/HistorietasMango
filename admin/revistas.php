<?php 

 ?>
<form action="WebMaster.php?modulo=revistas" method="post">
    <div class="row">
    <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-12 col-md-4" style="text-align: center">
            <h1 class="comic">Nueva Revista</h1>
            <input type="text" id="nombre_revista" name="nombre_revista" placeholder="Nombre de la aevista" class="form-control"/>
            <br>
            <textarea type="text" id="info_revista" name="info_revista" placeholder="Información de la revista" class="form-control" rows="4"></textarea> 
            <br>
            <select class="form-control" id="catalogo" name="catalogo">
            <?php 
                $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
                $query = "SELECT id_catalogo,nombre_catalogo FROM catalogo";
                $ejecuta = $pdo->prepare($query);
                $ejecuta->execute();
                $rs =  $ejecuta->fetchAll();
                foreach ($rs as $row) {
             ?>
                <option value="<?php echo $row['id_catalogo'];?>">
                    <?php echo $row['nombre_catalogo'];?>
                </option>
             <?php }?>
            </select>
            <br>
            <input type="number" id="nombre_revista" name="nombre_revista" placeholder="Número revista" class="form-control"/>
            <br>
            <h4 class="comic">Activar</h4>
            <input type="checkbox" id="activo" name="inactivo" class="form-control" placeholder="Activar" />
        </div>
        <div class="col-xs-12 col-md-4" style="text-align:center">
            <h4><br></h4>
            <h4 class="comic">Imagen</h4>
            <input type="file" class="form-control">
            <h4 class="comic">PDF/Archivo</h4>
            <input type="file" class="form-control">
            <br>
            <button class="btn btn-lg btn-warning comic" type="submit" >
                <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
            </button>
        </div>
    </div
</form> 