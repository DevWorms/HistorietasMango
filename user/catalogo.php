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

    <title>HistorietasMX - Catálogo</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css'>
    <link rel="stylesheet" href="css/style.css">
    <link href="../css/comix.css" rel="stylesheet">

</head>

<style>
    body { 
    background: url(Catalogo/back.png) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  p {
    font-size: 20px;
  }

  @media (min-width: 768px) {
    p {
      font-size: 30px;
    }      
  }
</style>

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
                <a href="index.php"> <img src="../img/logo2.png" height="50" width="130"> </a>
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

    <br><br><br><br>

    <!--    BEGIN BODY WEB    -->


    <div class="col-md-12">

        <!-- Flickity HTML init -->
        <p class="comic" align="center">NOVEDADES</p>
        <div class="gallery js-flickity">
          
          <?php echo MostrarNovedades($_GET["id_catalogo"]) ?>

        </div>

        <br><br><br>

        <p class="comic" align="center">LAS MÁS LEÍDAS</p>        
        <div class="gallery js-flickity">
          
        </div>

        <br><br><br>

        <p class="comic" align="center">RECOMENDACIONES</p>        
        <div class="gallery js-flickity">
          
        
        </div>

        <br><br><br>

    </div>
        

    <!--    END BODY WEB    -->


    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js'></script>
</body>
</html>
