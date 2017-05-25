<?php     
    require_once 'controladores/funciones_catalogo/funciones_muestra.php';
    $id=$_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HistorietasMX - Revista de Muestra</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/comix.css" rel="stylesheet">

    <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 
    <style>
        body { 
            background: url(img/backMag.png) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
    </style>

</head>

<body>
<!-- MODAL PARA MAYORIA DE EDAD -->
    <div id="modal-mayoriaEdad" class="modal fade" role="dialog" style="overflow: hidden;">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body" align="center">
                <p><h1 class="comic" align="center">Muy importante! ¿Eres mayor de edad? 18+</h1></p><br>
                    <div style="width: 850px;height: 350px;border: 1px solid black"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary comic" data-dismiss="modal">Soy Mayor de edad</button>
                <a href="index.php" class="btn btn-danger comic">No soy Mayor de edad</a>
              </div>
            </div>
          </div>
    </div>
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
                <a href="index.php" style="padding-top: 0px;"> <img src="img/logo2.png" height="50" width="130"> </a>
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn"><a href="muestra.php" style="text-decoration:none; color:#fff">Pa' atrás</a></button>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
          

    <?php echo MostrarRevista($id); ?>

          
    <div style="background:#fff; text-align:center;">
        <br>
            <h1 class="comic">¿Quieres más?</h1>
            <h3 class="comix">Todas las historietas dónde quieras y cuando quieras de <del>$80</del> a sólo <strong>$50</strong> pesitos mensuales</h1>
        <br>

        <a href="registro.php"><img src="img/atascate.png" id="atascate"></a>
    </div>
                
    <!--    -->
<!-- Leyenda mayoria de edad -->
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="row">
        <div class="col-md-12 col-xs-12 comic" align="center">
            Esta web contiene historietas con alto contenido sexual y su acceso está prohibido a menores de edad de acuerdo a la legislación vigente en cada país y región.
        </div>
    </div>
    <br>
    
    <!-- Modal -->
        <div id="Ingresar" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-body">
                    
                <div class="col-md-7">
                    <img src="img/0.jpg" width="100%">
                </div>

                <br>
                <p><h1 class="comic">Entrale! </h1></p><br>

                <div class="col-md-5 comix" style="height: 31em; overflow: scroll; background-color:#ff544e; color:#fff">
                    <br>

                    <form  method="post" id="login_form" action='controladores/sesion/iniciar_sesion.php'>
                      <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" required>
                      </div>
                      <button class="comic comic_btn" id="btn_acceder" name="btn_acceder" style="color:#fefc00">Ingresar</button>
                    </form>

                    <br>
                    <hr>


                    <p class="comix" text-align="center" style="font-size:18px;">¿Aún no tienes cuenta?</p>

                      <a href="registro.php" class="comic comic_btn" style="color:#1866b1; font-size:25px;">REGISTRATE</button>

                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>
        </div>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $(document).ready(function(){

         /*$('#modal-mayoriaEdad').modal({
            keyboard: false,
            backdrop: 'static'
        }); 

        $('#modal-mayoriaEdad').modal('show');*/
        
        $('.carousel').carousel({
            interval: 3000 //changes the speed
        });

    });
    
    </script>

</body>

</html>