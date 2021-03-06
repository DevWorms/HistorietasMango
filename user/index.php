<?php
    error_reporting(0);
    require_once '../controladores/sesion/sesion.php';
    require_once '../controladores/funciones_catalogo/funciones_catalogo.php';
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

    <title>HistorietasMX - Ediciones</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/full-slider.css" rel="stylesheet">
    <link href="../css/comix.css" rel="stylesheet">
    <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 

    <style type="text/css">
        h2,p{   font-size:100%;     font-weight:normal; }
        ul,li{  list-style:none;    }
        ul li a{    text-decoration:none;   color:#000; background:rgba(255, 84, 78, 0.22);  display:block; height:28em; width:17em; padding:1em; -moz-box-shadow:5px 5px 7px rgba(33,33,33,1); -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7); box-shadow: 5px 5px 7px rgba(33,33,33,.7);  }
        ul li{  margin-left:1em;     display:block; display: inline-block;}
        ul li h2{   font-size:140%; font-weight:bold;  padding-bottom:10px;  }        
        ul li a:hover,ul li a:focus{  box-shadow:10px 10px 7px rgba(0,0,0,.7); -moz-box-shadow:10px 10px 7px rgba(0,0,0,.7); -webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);  -webkit-transform: scale(1.25); -moz-transform: scale(1.25); -o-transform: scale(1.25);  position:relative;  z-index:5; }
        ol{text-align:center;}
        ol li{display:inline;padding-right:1em;}       

        html { 
          background: url(Prueba/fondo.png) no-repeat ; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
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
                <img src="../img/logo2.png" height="50" width="130">
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Acerca" style="color:#a1ddfc" onclick="window.location.href='cuenta.php'">Yo Mero</button>
                    </li>
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Ingresar" style="color:#ffffff" onclick="window.location.href='../controladores/sesion/cerrar_sesion.php'">Sáquese</button>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">

    <div class="col-md-12" style="text-align:center; position:center; z-index:3; position:absolute;">
        <div id="muestras" style="text-align:center; position:center;">
    <br><br><br>

        <p class="comic" style="color:#000; font-size:20px">

            <?php
                echo "Bienvenido <b>¡" . $_SESSION["Nombre"] . "!</b>";
            ?>
            
            <br>
            selecciona un catálogo.

        </p>


          <ul style="padding-left: 0px">

                <?php echo MostrarCatalogoUser(); ?>

          </ul>
      </div>
  </div>
          
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">


            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('Catalogo/catalogo1.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('Catalogo/catalogo4.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('Catalogo/catalogo2.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('Catalogo/catalogo5.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('Catalogo/catalogo3.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a href="#myCarousel" data-slide="prev">
        </a>
        <a href="#myCarousel" data-slide="next">
        </a>

    </header>

    <div >
                <a href="https://www.facebook.com/Historietasmx-332032027147432/" target="_blank"><img src="../img/facebook.jpeg" height="40" width="40" style="position:fixed; z-index:3; right:2em; bottom:1em"></a>
                <a href="https://www.instagram.com/historietas.mx/" target="_blank"><img src="../img/instagram.png" height="40" width="40" style="position:fixed; z-index:3; right:5em; bottom:1em"></a>
                <a href="https://twitter.com/historietas_mx" target="_blank"><img src="../img/twitter.png" height="40" width="40" style="position:fixed; z-index:3; right:8em; bottom:1em"></a>
                <a href="https://es.pinterest.com/historietasMX/" target="_blank"><img src="../img/pin.png" height="40" width="40" style="position:fixed; z-index:3; right:11em; bottom:1em"></a>
    </div>


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

</body>

</html>
