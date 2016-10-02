<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HistorietasMX</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/comix.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Acerca">Acerca de</button>
                    </li>
                    <li style="margin-top: 12px; margin-right: 6px; margin-left: 6px">
                        <button class="comic comic_btn" data-toggle="modal" data-target="#Ingresar" style="color:#fefc00">Entrale!</button>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">

                <a href="muestra.php">
                    <img src="img/access.png" height="850" width="850" class="img-responsive"  style="position:fixed; z-index:3; top:5em; left:5%"> </a> 
                <a href="https://www.facebook.com/Historietasmx-332032027147432/" target="_blank"><img src="img/facebook.jpeg" height="40" width="40" style="position:fixed; z-index:3; right:10em; bottom:1em"></a>
                <a href="https://www.instagram.com/historietas.mx/" target="_blank"><img src="img/instagram.png" height="40" width="40" style="position:absolute; z-index:3; right:13em; bottom:1em"></a>
                <a href="https://twitter.com/historietas_mx" target="_blank"><img src="img/twitter.png" height="40" width="40" style="position:absolute; z-index:3; right:16em; bottom:1em"></a>
                <a href="https://es.pinterest.com/historietasMX/" target="_blank"><img src="img/pin.png" height="40" width="40" style="position:absolute; z-index:3; right:19em; bottom:1em"></a>
                <a href="https://www.toukanmango.com/" target ="_blank"><img src="img/logo_editorial.png" style="position:absolute; z-index:3; right:2em; bottom:1em"></a>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">


            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/index1.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/index2.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('img/index3.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

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

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra arcu lorem. Aenean pharetra nunc mi, in pharetra ante ultrices vulputate. Duis volutpat odio in feugiat molestie. Maecenas a feugiat dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed sed diam aliquam, iaculis velit at, accumsan odio. Ut viverra pharetra nisi vitae finibus. Phasellus varius consectetur mattis. Fusce ornare dui quis tortor lacinia volutpat. Maecenas vehicula ante id posuere pretium. Phasellus a cursus ante, nec dictum dolor. Quisque mauris tellus, condimentum ac velit nec, sollicitudin congue massa. Nullam augue nunc, mattis ut tempus sed, imperdiet eu enim. Integer et felis magna.

                            Praesent in magna ultricies, porttitor ex non, interdum elit. Vestibulum dignissim sollicitudin tellus quis elementum. Aliquam feugiat augue non semper suscipit. Nam gravida ligula et interdum volutpat. In hac habitasse platea dictumst. Aenean viverra feugiat nibh, at malesuada quam aliquet sed. Cras nec malesuada nisl. Mauris ultricies faucibus urna, ut rhoncus turpis pretium quis. Nam venenatis neque in enim ultrices euismod. Nulla in quam metus. Etiam at erat tortor.

                            Praesent maximus neque sed dolor malesuada, vel dictum nunc aliquam. Maecenas sed orci vitae lacus sodales sollicitudin. Etiam vulputate erat a tellus sodales, et gravida tellus malesuada. Mauris feugiat ante sem, a congue urna lobortis eget. Duis justo eros, pharetra malesuada placerat viverra, egestas ut risus. Sed eget euismod odio. Pellentesque ullamcorper at turpis vitae dignissim. Sed neque quam, bibendum eu lacus id, elementum egestas urna. Praesent arcu quam, iaculis et efficitur at, ornare sit amet nisi. Nam elementum nibh a ullamcorper semper. Nulla metus eros, fermentum sed aliquet eget, rutrum in velit.
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

                    <form>
                      <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" required>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" required>
                      </div>
                      <button class="comic comic_btn" style="color:#fefc00">Ingresar</button>
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
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</body>

</html>
