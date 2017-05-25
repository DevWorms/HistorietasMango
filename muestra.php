<?php 
    session_start();
    error_reporting(0);  
    require_once 'controladores/funciones_catalogo/funciones_muestra.php';
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/humanity/jquery-ui.css">

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
            <form  method="post" name="formulario_muestra" id="formulario_muestra" action="Transactions.php?modulo=boletin">                          
                 <!-- <div class="form-group">
                      <label for="customer_name">Nombre completo:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group">
                      <label for="mail">Correo electrónico:</label>
                      <input type="email" class="form-control" id="mail" name="mail" required>
                  </div>-->
                  <br><br>
                  <a href="https://goo.gl/d6KYgK" class="btn btn-default comic btn-lg" id="btnPublicar" style="background-color:#000; color:#fff">       Enviar!
                  </a>
            </form>
        </div>
        

        <div class="col-md-6 comix letras">
            <strong>Échale un ojo</strong> a las revistas de muestra.<br>
            <a  href="https://goo.gl/d6KYgK" target="_blank">No olvides regalarnos tus datos</a>
            &nbsp;para que te echemos toda la información<br>
            de <italic>historietas.mx</italic>
        </div>

        <div id="muestras" class="col-md-12" style="text-align:center; position:center;">
        <hr>
            <h3 class="comix"> 
                Las de muestra, ¡Se vale tocar!
            </h3>
          <ul style="padding-left: 0px;">
            <?php echo MostrarImagenes(); ?>
          </ul>
      </div>
    </div>
    <div>
    <br><br>
        <div class="col-md-12" style="text-align:center;">
            <a href="https://www.facebook.com/Historietasmx-332032027147432/" target="_blank"><img src="img/facebook.jpeg" height="40" width="40"></a>
            <a href="https://www.instagram.com/historietas.mx/" target="_blank"><img src="img/instagram.png" height="40" width="40"></a>
            <a href="https://twitter.com/historietas_mx" target="_blank"><img src="img/twitter.png" height="40" width="40"></a>
            <a href="https://es.pinterest.com/historietasMX/" target="_blank"><img src="img/pin.png" height="40" width="40"></a>
        </div>
        <br><br>
        <!-- Leyenda mayoria de edad -->
        <div class="row">
            <div class="col-md-12 col-xs-12 comic" align="center">
                Esta web contiene historietas con alto contenido sexual y su acceso está prohibido a menores de edad de acuerdo a la legislación vigente en cada país y región.
            </div>
        </div>
        <br>
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

                      <button class="comic comic_btn" onclick="location.href='registro.php'" id="btn_acceder" name="btn_acceder" style="color:#1866b1">SUSCRÍBETE</button>

                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>
        </div>

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
    <?php
        //require_once 'admin/response.php'; 
     ?>
    <!-- Modal -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    $(document).ready(function(){
       /* if($("#modal-success") != null){
            $("#modal-success").dialog({
                autoOpen: true,
                show: {
                      effect: "bounce",
                      duration: 500
                    },
                hide: {
                      effect: "clip",
                      duration: 500
                    },
                 position: { 
                            my: "center", 
                            at: "center", 
                            of: window 
                    },
                width: screen.width * 0.35,
                resizable:false
            });
        }

        $('#modal-mayoriaEdad').modal({
            keyboard: false,
            backdrop: 'static'
        }); 

        $('#modal-mayoriaEdad').modal('show');*/

    });
    </script>

</body>

</html>
