<?php
$success = false;

if(isset($_POST['customer_email'])){
	require_once 'controladores/datos/ConexionBD.php';
    $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	$customer_email = $_POST['customer_email'];
	
	$consultaCorreo = "SELECT * FROM usuarios WHERE correo_usuario = ? ";
    $sentenciaCorreo = $pdo->prepare($consultaCorreo);
    $sentenciaCorreo->bindParam(1,$customer_email);
    $sentenciaCorreo->execute();                
    $resultado = $sentenciaCorreo->fetch();
	
	$correo = $resultado['correo_usuario'];
	$contrasena = $resultado['contrasena'];
	if($correo != null){
		enviarCorreo($correo,$contrasena);
		$aviso = "Mensaje enviado, consulte su bandeja de correo electrónico.";
		$success = true;
		
	}else{
		$aviso = "No hay ningún registro con ese correo electrónico.";
	}
	
}else{
	$aviso = "Un mensaje con su contraseña será enviado a ese correo";
    $success = true;
}

function enviarCorreo($email,$pass){
	$asunto = "Recuperación de contraseña";
	$mensaje = "Buen dia:\r\nUsted solicitó la recuperación de su contraseña.\r\nSu contraseña es: ".$pass."\r\nTenga un buen día de parte de HistorietasMX.";
	$cabezera = "From: webmaster@historietas.mx";
	mail($email,$asunto,$mensaje,$cabezera);
}

?>
<!doctype html>
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
    <link href="css/index.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
</head>

<body>
	<br><br>
    <form action="recuperar.php" method="post">
	    <p class="comix" align="center">Para recuperar su contraseña, escriba el correo electronico con el que se registró.</p>
	    <div class="form-group">
            <input type="email" class="form-control" id="customer_email" name="customer_email" value="" required style="width: 50%;margin: 0 auto">
        </div>
        <div align="center">
            <button class="comic comic_btn" style="color:#ff0006">consultar</button>
        </div>
    </form>
    <br>
	<p class="comix" align="center"><?php echo $aviso;?>
	</p>

    <script src="js/sweetalert.min.js"></script>

    <?php
        if ($aviso != null) {
            ?>
    <script>
        swal({
            title: "",
            text: "<?php echo $aviso; ?>",
            type: "<?php echo ($success) ? "success" : "error"; ?>",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
            <?php
        }
    ?>
</body>
</html>
