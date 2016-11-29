<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="../css/comix.css" rel="stylesheet">

    <title>HistorietasMX</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">
</head>

<body style="background-color:#ff544e;">

    <!-- Navigation -->
    <div class="container"   style="width: 270px;">
        <form class="form-signin" method="post" id="login_form" action='../controladores/sesion/iniciar_sesion_a.php'>
            <h2 class="form-signin-heading comix" align="center">Acceder</h2>
            <br>
            <input type="email" id="email" name="email"  class="form-control" placeholder="Correo electrónico" required autofocus>
            <br>
            <input type="password" id="pwd"  name="pwd" class="form-control" placeholder="Contraseña" required>
            <br><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_acceder" id="btn_acceder">Acceder</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
