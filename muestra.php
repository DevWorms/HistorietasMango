<?php 
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

    <title>HistorietasMX - Free</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/comix.css" rel="stylesheet">
    <link href="css/muestra.css" rel="stylesheet">

    <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 


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
                <a href="index.php" style="padding-top: 0px;"> <img src="img/logo2.png" height="50" width="130"> </a>
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Ingresar" style="color:#fefc00; border-color:#fff">Entrale!</button>    
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="col-md-12" style="text-align:center; position:center;">
    <br><br>
        
        <h1 class="comic top-title"> 
            ¡Te damos una embarradita!
        </h1>
        <br>

        <div class="col-md-6">
            <form  method="post" name="formulario_muestra" id="formulario_muestra" action="controladores/suscripcion_usuario/SuscripcionUsuario.php">                          
                  <div class="form-group">
                      <label for="customer_name">Nombre completo:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group">
                      <label for="mail">Correo electrónico:</label>
                      <input type="email" class="form-control" id="mail" name="mail" required>
                  </div>
                  <input type="hidden" name="donde" id="donde" value="muestra">
                  <button type="submit" class="btn btn-default comic" id="btnPublicar" style="background-color:#000; color:#fff">       Enviar!
                  </button>
            </form>
            <?php echo $_SESSION['msg'];?>
        </div>
        

        <div class="col-md-6 comix letras">
            <strong>Échale un ojo</strong> a las revistas de muestra.<br>
            No olvides regalarnos tus datos para que te echemos toda la información<br>
            de <italic>historietas.mx</italic>
        </div>


        <div id="muestras" class="col-md-12" style="text-align:center; position:center;">
        <hr>
            <h3 class="comix"> 
                Las de muestra, ¡Se vale tocar!
            </h3>
          <ul style="padding-left: 0px;">
            <li>
              <a href="revista.php" style="margin-bottom:2em; background:rgba(246, 243, 0, 0.24); color:#ff544e; text-decoration:none">
                <h2><img src="Prueba/Erotika1.jpg" height="241" width="210"></h2>
                <p><h2 class="enlace comix">Erótika #1</h2></p>
              </a>
            </li>
            <li>
              <a href="revista.php" style="margin-bottom:2em; background:rgba(91, 192, 222, 0.25); color:#ff544e; text-decoration:none">
                <h2><img src="Prueba/Chambeadoras.jpg" height="241" width="210"></h2>
                <p><h2 class="enlace comix">Chambeadoras #2</h2></p>
              </a>
            </li>
            <li>
              <a href="revista.php" style="margin-bottom:2em;  color:#ff544e; text-decoration:none">
                <h2><img src="Prueba/Erotika2.jpg" height="241" width="210"></h2>
                <p><h2 class="enlace comix">Erótika #3</h2></p>
              </a>
            </li>
            <li>
              <a href="revista.php" style="margin-bottom:2em; background:rgba(253, 179, 0, 0.27); color:#ff544e; text-decoration:none">
                <h2><img src="Prueba/Erotika1.jpg" height="241" width="210"></h2>
                <p><h2 class="enlace comix">Erótika #4</h2></p>
              </a>
            </li>
          </ul>
      </div>
    </div>
    <div>
    <br>
        <div class="col-md-12" style="text-align:center;">
            <a href="https://www.facebook.com/Historietasmx-332032027147432/" target="_blank"><img src="img/facebook.jpeg" height="40" width="40"></a>
            <a href="https://www.instagram.com/historietas.mx/" target="_blank"><img src="img/instagram.png" height="40" width="40"></a>
            <a href="https://twitter.com/historietas_mx" target="_blank"><img src="img/twitter.png" height="40" width="40"></a>
            <a href="https://es.pinterest.com/historietasMX/" target="_blank"><img src="img/pin.png" height="40" width="40"></a>
        </div>
    <br><br>
    </div>
    

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

                <div class="col-md-5 comix" style="height: 29em; overflow: hidden; background-color:#ff544e; color:#fff">
                    <br>
                    <h2>Inicia Sesión</h2>
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

                    <p class="comix" text-align="center" style="font-size:18px;">¿Aún no tienes cuenta?</p>

                      <button class="comic comic_btn" onclick="location.href='registro.php'" id="btn_acceder" name="btn_acceder" style="color:#1866b1">REGISTRATE</button>

                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>
        </div>

    <!-- Modal -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</body>

</html>
