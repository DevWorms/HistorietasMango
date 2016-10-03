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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css'>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/comix.css" rel="stylesheet">

</head>

<style>
    body { 
    background: url(img/backReg.png) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
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
                <a href="index.php"> <img src="img/logo2.png" height="50" width="130"> </a>
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn"><a href="muestra.php" style="text-decoration:none; color:#fefc00" onclick="window.history.back()">Regresar</a></button>
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

      <div class="col-md-5">
        
        <h2 class="comic">Información de usuario</h2>

          <hr>
          <form>
            <div class="form-group">
              <label for="email">Nombre completo:</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="email">Correo electrónico:</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="email">Contraseña:</label>
              <input type="password" class="form-control" id="pwd" required>
            </div>
            <br>
          <h2 class="comic">Datos de pago</h2>
            <hr>
              <div class="form-group">
                <label for="text">Número de tarjeta:</label>
                <input type="text" class="form-control" id="tarjeta" required>
              </div>
              <div class="form-group">
                <label for="text">Vence:</label>
                <input type="text" class="form-control" id="tarjeta" required style="width:15%; display:inline;">
                <input type="text" class="form-control" id="tarjeta" required style="width:15%; display:inline;">
                
                <label for="text">CVV:</label>
                <input type="text" class="form-control" id="tarjeta" required style="width:15%; display:inline;">
              </div>            
              <div class="form-group">
                <label for="text">Nombre del titular:</label>
                <input type="text" class="form-control" id="tarjeta" required>
              </div>            
              <div class="form-group">
                <label for="text">Dirección de facturación:</label>
                <input type="text" class="form-control" id="tarjeta" required>
              </div>
              <button class="comic comic_btn" style="color:#ff0006">Realizar pago.</button>
        <br><br><br><br>

          </form>
    </div>
  

    </div>
        
    <!--    END BODY WEB    -->


    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js'></script>
</body>
</html>
