<div class="container">
        <br><br>
        <h2 style="text-align:center">Ingresa nueva revista</h2>
        <hr>
        <br>
        <div class="container-fluid">
            <div class="row-fluid">


                <!--  FORMULARIO PARA CREAR NUEVO PLATILLO  -->
                <div class="span6">
                    <form class="form-horizontal" role="form" action="Parse/nuevoplatillo.php" method="POST" enctype="multipart/form-data" >

                        <div class="form-group">
                            <label class="control-label col-sm-2">Nombre:</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="nombre" name="nombre" ng-model="platillo" placeholder="Ingresa nombre de la revista" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Catálogo:</label>
                            <div class="col-sm-10">          
                                <select id="nivel" class="form-control" name="nivel">
                                    <option value="Principiante">Las Chambeadoras</option>
                                    <option value="Intermedio">Erotika</option>
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Número de revista:</label>
                            <div class="col-sm-10">          
                                <input class="form-control" id="porciones" name="porciones" placeholder="Ingresa porciones del platillo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Información adicional:</label>
                            <div class="col-sm-10">          
                                <textarea class="form-control" rows="5" id="procedimiento" name="procedimiento" ng-model="procedimiento" placeholder="Ingresa el procedimiento" required></textarea>
                            </div>
                        </div>                           
                        <div class="form-group">
                            <label class="control-label col-sm-2">Etiquetas:</label>
                            <div class="col-sm-10">          
                                <textarea class="form-control" rows="5" id="etiquetas" name="etiquetas" placeholder="#tag1 #tag2 #tag3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Asociar a menú:</label>
                            <div class="col-sm-10">          
                                <select id="menu" class="form-control" name="menu">
                                    <?php echo Asociar(); ?>
                                </select>
                                <br>
                            </div>
                        </div>

                        <div>
                            <input type="file" name="documento" id="documento"/><br><br>
                        </div>

                        <hr>
                        
                        <div  class="form-group" style="font-size:20px;">
                              <input type="checkbox" id="activo" name="activo" checked> ¿Activo? (Si está activo, aparecerá inmediatamente en los dispositivos.)
                        </div>

                        <div class="form-group" style="text-align: right;">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" id="btnPublicar">Publicar Receta</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Editorial ToukanMango 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>