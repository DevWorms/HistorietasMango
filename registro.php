<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HistorietasMX - Registro</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css'>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/registro.css" rel="stylesheet">
    <link href="css/comix.css" rel="stylesheet">

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
                <a href="index.php"> <img src="img/logo2.png" height="50" width="130"> </a>
                <br>
            </div>
            
            <!--Hola mundo -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <!--<span class="comic comic_btn">
                        <a href="index.php" style="text-decoration:none; color:#fefc00">Pa atrás</a>
                        </span>-->
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
        
        <h2 class="comic" id="mtitle">Información de usuario</h2>
          
          <form action="controladores/pagos/controller.php" method="post">
              <div class="form-group">
                  <label for="customer_name">Nombre completo:</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name" value="" required>
              </div>
              <div class="form-group">
                  <label for="customer_email">Correo electrónico:</label>
                  <input type="email" class="form-control" id="customer_email" name="customer_email" value="" required>
              </div>
              <div class="form-group">
                  <label for="pwd">Contraseña:</label>
                  <input type="password" class="form-control" id="pwd" name="pwd" required>
              </div>
              <div class="form-group">
                  <label for="edad">Edad:</label>
                  <input type="text" class="form-control" id="edad" name="edad" value="" required>
              </div>
              <div class="form-group">
                  <label>Sexo:</label>
                  <select name="sexo" class="form-control">
                      <option value="0">--</option>
                      <option value="1">Mujer</option>
                      <option value="2">Hombre</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Soy mayor de 18 años:</label>
                  <input type="radio" class="form-control" id="radio_edad" name="radio_edad" value="" required>
              </div>
              
              <h2 class="comic" align="center">Pa gozar hay que pagar ¡No se haga!  </h2>
              <h3 class="comic" align="center">¡Sólo <strong>$50</strong> pesitos mensuales!  </h3>
              <br><br>
                <div class="row">
                  <div class="col-md-6">
                     <label>
                      <input type="radio" name="formadepago" value="compropago" id="formadepago1_0" required>
                      <img type="image" src="https://compropago.com/assets/payment-green-btn.png" border="0"  alt="Pagar con ComproPago">
                    </label>
                    <br>
                    <label>
                      <input type="radio" name="formadepago" value="paypal" id="formadepago1_1">
                      <img type="image" src="https://www.sandbox.paypal.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0"  alt="PayPal, la forma más segura y rápida de pagar en línea."/>
                    </label>
                  </div>
                  
                  <div class="col-md-6">
                     <img width="200" src="img/compra-segura.png">
                  </div>
                </div>
                <br>
                <div class="col-md-6" align="center">
                    <button class="comic comic_btn" style="color:#ff0009">Realizar pago</button>
                  </div>
             
                <br><br><br>
          </form>
         
        </div>
      

          <img class="col-md-7"src="img/registrate.png">


    </div>
    <!-- Leyenda mayoria de edad -->
    <div class="row">
        <div class="col-md-12 col-xs-12 comic" align="center">
            Esta web contiene historietas con alto contenido sexual y su acceso está prohibido a menores de edad de acuerdo a la legislación vigente en cada país y región.
        </div>
    </div>
    <br>
    <!--    END BODY WEB    -->
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

    <!-- jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js'></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        /*$('#modal-mayoriaEdad').modal({
            keyboard: false,
            backdrop: 'static'
        }); 
        $('#modal-mayoriaEdad').modal('show');*/

    });
    

    </script>
</body>
</html>