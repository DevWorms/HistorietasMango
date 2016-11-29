<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="historieta, comic, hentai, sex, sexy, dibujo, erotic, anime, picaro, picardia, humor, chistoso, vintage, manga, albur, mexicano, sensacional, historias, revista, chambeadoras">

    <title>HistorietasMX</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/comix.css" rel="stylesheet">
    

    <style>
        #imagen { 
            z-index: 1000;
            width: 40%; 
            height: 40em;
            background-size: contain;              
            background-image: url("img/access_N.png");
            background-repeat: no-repeat;
            margin:auto;
        }

        #imagen:hover { 
            z-index: 1000;
            width: 40%; 
            height: 40em;
            background-size: contain; 
            background-image: url("img/access_H.png");
            background-repeat: no-repeat;
        }
    </style>

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
                <img src="img/logo2.png" height="50" width="130">
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

    <!-- Full Page Image Background Carousel Header -->
    <header id="top" class="header">
        <div>                
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="position: absolute; z-index: -1; width: 100%;">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="img/index1.jpg" alt="Chania">
                    </div>

                    <div class="item">
                      <img src="img/index2.jpg" alt="Chania">
                    </div>

                    <div class="item">
                      <img src="img/index3.jpg" alt="Flower">
                    </div>
                </div>

        </div>
        <br><br><br>
        <a href="muestra.php">
            <div id="imagen">        
            </div>        
        </a>
    </header>

    <div>
    <br>
        <div class="col-md-3" style="text-align:center;">
            <button class="comic comic_btn" data-toggle="modal" data-target="#Acerca">Acerca de</button><br><br>        
        </div>
        <div class="col-md-6" style="text-align:center;">
            <button class="comic comic_btn" data-toggle="modal" data-target="#Aviso">Pásele por acá! (Aviso de Privacidad y Términos de uso)</button> <br><br>       
        </div>
        <div class="col-md-3" style="text-align:center;">
            <a href="https://www.facebook.com/Historietasmx-332032027147432/" target="_blank"><img src="img/facebook.jpeg" height="40" width="40"></a>
            <a href="https://www.instagram.com/historietas.mx/" target="_blank"><img src="img/instagram.png" height="40" width="40"></a>
            <a href="https://twitter.com/historietas_mx" target="_blank"><img src="img/twitter.png" height="40" width="40"></a>
            <a href="https://es.pinterest.com/historietasMX/" target="_blank"><img src="img/pin.png" height="40" width="40"></a>
        </div>
    <br><br>
    </div>

    <!-- Modal -->
        <div id="Acerca" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-body">
                    
                <div class="col-md-7">
                    <img src="img/39.jpg" width="100%">
                </div>

                <br>
                <p><h1 class="comic">Acerca de... </h1></p><br>

                    <div class="col-md-5 comix" style="height: 31em; overflow: scroll; background-color:#ff544e; color:#fff">
                            
                            <br>                        
                            <img src="img/logo2.png" width="100%">

                            La picardía, el humor, la calentura, los albures y más, forman todos parte de ésta colección que estamos rescatando sólo para ti, diviértete leyendo todas y pasa un rato super entretenido... estamos seguros que te picarás con cada una de las historias
                    </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-success comic" data-dismiss="modal">¡Lo tengo!</button>
              </div>
            </div>

          </div>
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

                <div class="col-md-5 comix" style="height: 31em; overflow: scroll; background-color:#ff544e; color:#fff">
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
                    <hr>


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
        <div id="Aviso" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-body">

                <p><h1 class="comic" align="center">Aviso de Privacidad </h1></p><br>

                    <div class="col-md-12" style="height: 31em; overflow: scroll; background-color:#ff544e; color:#fff; text-align:center">
                            
                            <br>                                                    
                                De acuerdo a lo Previsto en la “Ley Federal de Protección de Datos Personales”, declara <strong>@EMPRESA</strong>, ser una empresa legalmente constituida de conformidad con las leyes mexicanas, con domicilio en <strong>@DOMICILIO</strong> y como responsable del tratamiento de sus datos personales, hace de su conocimiento que la información de nuestros clientes es tratada de forma estrictamente confidencial por lo que al proporcionar sus datos personales, tales como: 
                                 <br><br>
                                1.     Nombre Y/O Razón Social.<br>
                                2.     Dirección.<br>
                                3.     Registro Federal de Contribuyentes.<br>
                                4.     Teléfonos de Oficina y móviles<br>
                                5.     Correo Electrónico.
                                 <br><br>
                                Estos serán utilizados única y exclusivamente para los siguientes fines:  
                                 
                                1.     Campañas de Publicidad.<br>
                                2.     Campañas de Fidelidad.<br>
                                3.     Información y Prestación de Servicios.<br>
                                4.     Actualización de la Base de Datos.<br>
                                5.     Cualquier finalidad análoga o compatible con las anteriores.<br>
                                 <br><br>
                                Para prevenir el acceso no autorizado a sus datos personales y con el fin de  asegurar que la información sea utilizada para los fines establecidos en este aviso de privacidad, hemos establecido diversos procedimientos con la finalidad de evitar el uso o divulgación no autorizados de sus datos, permitiéndonos tratarlos debidamente.  Así mismo, le informamos que sus datos personales pueden ser Transmitidos para ser tratados por personas distintas a esta empresa.   Todos sus datos personales son tratados de acuerdo a la legislación aplicable y vigente en el país, por ello le informamos que usted tiene en todo momento los derechos (ARCO) de acceder, rectificar, cancelar u oponerse al tratamiento que le damos a sus datos personales; derecho que podrá hacer valer a través del Área de Privacidad encargada de la seguridad de datos personales en el Teléfono 2451.4070.
                                  <br><br>
                                A través de estos canales usted podrá actualizar sus datos y especificar el medio por el cual desea recibir información, ya que en caso de no contar con esta especificación de su parte, Tempco México, S.A. de C.V., establecerá libremente el canal que considere pertinente para enviarle información.  Este aviso de privacidad podrá ser modificado por <strong>@EMPRESA</strong>, dichas modificaciones serán oportunamente informadas a través de correo electrónico, teléfono, página web o cualquier otro medio de comunicación que Tempco México, S.A. de C.V., determine para tal efecto. 
                                           <br><br><br>                      
                                 
                                 
                                ATENTAMENTE
                                @EL_QUE_SUSCRIBE
                                <br><br>
                    </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-success comic" data-dismiss="modal">¡Lo tengo!</button>
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
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</body>

</html>
