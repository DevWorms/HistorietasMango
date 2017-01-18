<?php
    require_once '../controladores/datos/ConexionBD.php';
    error_reporting(0);
    session_start();
    if(isset($_SESSION["Id"]) and $_SESSION["Id"] != "" and $_SESSION["Id"] !=0){
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
    <link rel="stylesheet" type="text/css" href="css/mystyles.css">
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
                        <a href="WebMaster.php?modulo=usuarios" class="comic" style="color:#000000">Usuarios</a>
                    </li>              
                    <li>
                        <a href="WebMaster.php?modulo=muestras"  class="comic" style="color:#000000">Agregar nueva muestra</a>
                    </li>            
                    <li>
                        <a href="WebMaster.php?modulo=catalogos"  class="comic" style="color:#000000">Modificar catálogo</a>
                    </li>            
                    <li>
                        <a href="WebMaster.php?modulo=revistas"  class="comic" style="color:#000000">Nueva revista</a>
                    </li>            
                </ul>
                <div class="container" style="text-align: right;">
                    <button type="button" class="btn btn-danger btn-lg" style="margin-top: 2px;" onclick= "location.href='./class/cerrar_sesion_a.php'">Salir</button>
        </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br><br>
    <!-- Page Contents  -->
    <?php 
        $pagina = $_GET['modulo'];
        if($pagina=="revistas"){
            require_once 'revistas.php';
        }
        else if($pagina == 'usuarios'){
            require_once 'usuarios.php';
        }
        else if($pagina == 'muestras'){
            require_once "muestras.php";
        }else if($pagina == 'catalogos'){
            require_once 'catalogos.php';
        }
        else if(! isset($pagina)){
            require_once 'stats.php';
        }
     ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>



     <!-- js Propios -->
    <script type="text/javascript" src="js/validator.js"></script>


</body>
<?php } ?>
</html>
