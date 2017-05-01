       <?php 
       require_once 'class/login_mysql.php';
       require_once 'class/ConexionBD.php';
       require_once 'class/Usuarios.php';
       ?>
        <div class="row" style="width:100%">
            <div class="col-xs-12 col-md-3"></div>
            <div class="col-xs-12 col-md-6">
                <h1 class="comic">Administradores actuales</h1>
                <hr>
                <form action="TransactionsAdmin.php?modulo=buscarAdmins" method="post" name="form-searcAdminds" class="row">   
                    <div class="col-md-9">
                      <input type="text" name="busqueda_admin" id="busqueda_admin" placeholder="Busqueda" class="form-control">  
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary comic" style="font-weight: bold">
                            Buscar <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </form>
                <br>
                <table class="table table-striped tabla-admins">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Contrase&ntilde;a</th>
                        <tr>  
                    </thead>
                    <?php 
                        $parametro = "";
                        if(isset($_GET['busqueda_admin'])){
                            $parametro = $_GET['busqueda_admin'];
                        }
                        $admins = new Usuarios();
                        $rs =  $admins->buscaAdministradores($parametro);
                        foreach($rs as $row){
                    ?> 
                        <tr>
                            <td>
                                <?php echo $row['nombre_usuario'];?>
                            </td>
                            <td>
                                <?php echo $row['correo_usuario'];?>
                            </td>
                            <td>
                                <?php echo $row['contrasena'];?>
                            </td>
                            <td>
                                <a style="color: red;font-size: 18px" href="TransactionsAdmin.php?modulo=borrarAdmin&id=<?php echo $row['id_usuario'];?>">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <button type="submit" class="btn btn-danger comic" style="font-weight: bold;float: right" data-toggle="modal" data-target="#nuevoAdmin_modal">
                    Nuevo Administrador 
                    <i class="glyphicon glyphicon-plus"></i>
                </button>
            </div>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="nuevoAdmin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Agregar Nuevo Administrador</h3>
                </div>
                <form method="post" action="TransactionsAdmin.php?modulo=saveUsuario" style="width:90%;margin: 0 auto" onsubmit="return validaFormulario()">
                    <div class="modal-body">
                    
                        <b>Nombre Administrador</b>
                        <input type="text" id="nombre" name="nombre" class="form-control" onblur="validaExp(this,'alfaNum')" required>
                        <span style="font-weight:bold;color: red"></span>
                        <b>Correo Administrador</b>
                        <input type="text" id="correo" name="correo" class="form-control" onblur="validaExp(this,'mail')" required>
                        <span style="font-weight:bold;color: red"></span>
                        <b>Contraseña Administrador</b>
                        <input type="text" id="contrasena" name="contrasena" class="form-control" onblur="validaExp(this,'alfaNum')" required>
                        <span style="font-weight:bold;color: red"></span>
                        <b>Repetir Contraseña</b>
                        <input type="text" id="recontrasena" name="recontrasena" class="form-control" onblur="validaExp(this,'alfaNum')" required>
                        <span style="font-weight:bold;color: red"></span>
                        <input type="hidden" name="funcion" id="funcion" value="guardar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default comic" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-warning comic">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<style type="text/css">
.tabla-admins{
    width: 100%;
    height: 100px;
    overflow: hidden;
}
</style>


