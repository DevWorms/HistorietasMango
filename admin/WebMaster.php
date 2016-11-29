<?php
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HistorietasMX</title>

    <link href="../css/comix.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>

    <div ng-app="">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#ff544e; border-color:#ff544e;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand comic" href="WebMaster.php" style="color:#000000">INICIO</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Usuarios.php" class="comic" style="color:#000000">Usuarios</a>
                    </li>            
                    <li>
                        <a href="#"  class="comic" style="color:#000000">Estadísticas</a>
                    </li>
                </ul>
                <div class="container" style="text-align: right;">
                    <button type="button" class="btn btn-danger btn-lg" style="margin-top: 2px;" onclick= "location.href='./class/cerrar_sesion.php'">Salir</button>
        </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <br><br>

        <h2 style="text-align:center">Ingresa Revistas</h2>
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

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

</body>

</html>
