<?php
    error_reporting(0);
    require_once '../controladores/funciones_catalogo/funciones_admin.php';
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
                    <li>
                        <a href="#"  class="comic" style="color:#000000">Agregar nueva muestra</a>
                    </li>            
                    <li>
                        <a href="#"  class="comic" style="color:#000000">Modificar catálogo</a>
                    </li>            
                    <li>
                        <a href="#"  class="comic" style="color:#000000">Nueva revista</a>
                    </li>            
                </ul>
                <div class="container" style="text-align: right;">
                    <button type="button" class="btn btn-danger btn-lg" style="margin-top: 2px;" onclick= "location.href='../controladores/sesion/cerrar_sesion_a.php'">Salir</button>
        </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <br><br>

        <h2 style="text-align:center">Bienvenido</h2>
        <hr>
        <br>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#8ed4ff;">
                <div class="panel-body">
                    <h4>Número de usuarios registrados</h4>  
                     <h2> <strong> 4 </strong></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#fffc8e;">
                <div class="panel-body">
                    <h4>Número de usuarios premium</h4>  
                     <h2> <strong> 4 </strong></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#ff8e8e;">
                <div class="panel-body">
                    <h4>Total de Revistas</h4>  
                     <h2> <strong> 4 </strong></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#9fff8e;">
                <div class="panel-body">
                    <h4>Promedio de edad</h4>  
                     <h2> <strong> 4 </strong></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#8eb1ff;">
                <div class="panel-body">
                     <h2> <strong>Hombres: 4 </strong></h2>
                     <h2> <strong>Mujeres: 4 </strong></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
            <div class="panel panel-default" style="background-color:#8ed4ff;">
                <div class="panel-body">
                    <h4>Usuarios no registrados pero en lista de Mailchimp</h4>  
                     <h2> <strong> 4 </strong></h2>
                </div>
            </div>
        </div>

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
