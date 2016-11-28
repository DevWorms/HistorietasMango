<?php
    error_reporting(0);
    require_once '../controladores/sesion/sesion.php';
    require_once '../controladores/funciones_usuario/funciones_usuario.php';
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
    background: url(Catalogo/backUser.png) no-repeat center center fixed; 
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
                <a href="index.php"> <img src="../img/logo2.png" height="50" width="130"> </a>
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn"><a href="muestra.php" style="text-decoration:none; color:#fefc00" onClick="window.history.back()">Regresar</a></button>
                    </li>
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Ingresar" style="color:#ffffff" onClick="window.location.href='../controladores/sesion/cerrar_sesion.php'">Salir</button>
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

        <?php

          if($_SESSION["Premium"] == 0)
            echo '<h1 class="comic" style="color:#BB0006">¡Ya no cuentas con crédito disponible, te invitamos a pagar otro mes de membresía!</h1>';

        ?>

        <h3 class="comix">
          
          <?php echo "Nombre: " . $_SESSION["Nombre"];   ?>
          <br>
          <?php echo "Meses disponibles: " . $_SESSION["Premium"];   ?>
          <br>
          Caducidad de cuenta: <?php echo MostrarCaducidad($_SESSION["Id"]);   ?>
        
        </h3>

          <hr>
          <form  method="post" id="correo_form" action='../controladores/funciones_usuario/cambiar_correo.php'>
            <div class="form-group">
                <label for="email">Correo Asociado:</label>
                <input type="email" class="form-control" name="mail" id="mail" required value="<?php echo $_SESSION["Correo"]; ?>">
            </div>
            <button class="comic comic_btn" id="btn_aceptar" name="btn_aceptar" style="color:#ff0006">Cambiar correo.</button>
          </form>

            <br><br>
          
          <form  method="post" id="pwd_form" action='../controladores/funciones_usuario/cambiar_contrasena.php'>
            <div class="form-group">
              <label for="email">Cambiar contraseña:</label>
              <input type="password" class="form-control" name="pwd" id="pwd" required>
            </div>
            <button class="comic comic_btn" id="btn_aceptar" name="btn_aceptar"  style="color:#ff0006">Cambiar contraseña.</button>
          </form>
          <br>
            <div class="form-group">
                <p class="comic">Edad: <?php echo $_SESSION["Edad"];?></p>
            </div>
                <p class="comic">Sexo: <?php 
				    if($_SESSION["Sexo"] == 2){
						echo 'Hombre';
					}else if($_SESSION["Sexo"] == 1)
					{
						echo 'Mujer' ;
					}
					
				?></p>

          <hr>

          <h2 class="comic">Aquí se paga. "Hoy no fío mañana tampoco" </h2>
          <h2 class="comic">Formas de pago</h2>
          <form action="https://compropago.com/comprobante" method="post">
              <input type="hidden" name="public_key" value="pk_test_962f27606164387129">
              <input type="hidden" name="product_price" value="150.00">
              <input type="hidden" name="product_name" value="Membresia 1 mes">
              <input type="hidden" name="product_id" value="M1M">
              <input type="hidden" name="customer_name" value="<?php echo $_SESSION["Nombre"];?>">
              <input type="hidden" name="customer_email" value="<?php echo $_SESSION["Correo"];?>">
              <input type="hidden" name="customer_phone" value="">
              <input type="hidden" name="image_url" value="">
              <input type="hidden" name="success_url" value="http://www.historietas.mx">
              <input type="hidden" name="failed_url" value="">
              <input type="image" src="https://compropago.com/assets/payment-green-btn.png" border="0" name="submit" alt="Pagar con ComproPago">
          </form>
          <!--
          <h2 class="comic">Datos de pago</h2>
>>>>>>> origin/master

            <form>
              <div class="form-group">
                <label for="text">Número de tarjeta:</label>
                <input type="text" class="form-control" id="tarjeta" required>
              </div>
              <div class="form-group">
                <label for="text">Vence:</label>
                <input type="text" class="form-control" id="tarjeta" required style="width:15%; display:inline;">
                <input type="text" class="form-control" id="tarjeta" required style="width:15%; display:inline;">
                
                <label for="text">CNV:</label>
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
          </form>
          -->
    </div>
  

    </div>
        

    <!--    END BODY WEB    -->


    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js'></script>
</body>
</html>
