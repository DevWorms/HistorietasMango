<?php
    error_reporting(0);
    require_once 'class/sesion.php';
    include_once "Parse/mostrarusuarios.php";
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

    <title>APP-COCINA</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="WebMaster.php">App-Cocina</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Nuevo.php">Nuevo Platillo</a>
                    </li>
                    <li>
                        <a href="Menu.php">Actualizar Menú</a>
                    </li>
                    <li>
                        <a href="Usuarios.php">Usuarios</a>
                    </li>
                    <li>
                        <a href="Configuracion.php">Configuración de Cuenta</a>
                    </li>                 
                    <li>
                        <a href="#">Estadísticas</a>
                    </li>
                </ul>
                <div class="container" style="text-align: right;">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ModalPush">Push Notification</button>
                    <button type="button" class="btn btn-danger btn-lg" style="margin-top: 2px;" onclick= "location.href='./class/cerrar_sesion.php'">Salir</button>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <br><br><br>
        <h2>Usuarios Registrados</h2>  
                    
        
        <?php
            echo mostrarUsuarios();
        ?>

        <hr>
        <br><br><br><br>
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

        <!-- Ventana de Push Notification -->
    <div id="ModalPush" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Servicio de "Push Notifications"</h4>
                </div>

                <div class="modal-body" style="padding-left: 50px">
                
                    <form class="form-horizontal" role="form" action="Parse/pushnotification.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="push" name="push" placeholder="Ingresa el texto de tu notificación.">
                                <br><br>
                                <div  class="form-group" style="font-size:20px;">
                                      <input type="checkbox" id="ios" name="ios" > Usuarios iOS
                                </div>
                                <div  class="form-group" style="font-size:20px;">
                                      <input type="checkbox" id="android" name="android" > Usuarios Android
                                </div>                                
                                <div  class="form-group" style="font-size:20px;">
                                      <input type="checkbox" id="free" name="free" > Usuarios Free
                                </div>
                                <div  class="form-group" style="font-size:20px;">
                                      <input type="checkbox" id="vencimiento" name="vencimiento" > Vencimiento cercano de membresía
                                </div>
                             </div>
                
                        </div>
                    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="btnPublicar">Lanzar Push Notification</button>
                        </div>

                    </form>
            </div>

          </div>
        </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
