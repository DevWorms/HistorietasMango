<?php
    //registro del usuario en la base de datos
    require_once '../datos/ConexionBD.php';
	
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	
	$sentenciaRegistro = $pdo->prepare("INSERT INTO usuarios (nombre_usuario,correo_usuario,contrasena,sexo,edad,premium,API) VALUES (:Usuario,:Correo,:Contrasena,:Sexo,:Edad,'0',:API)");
	
	$sentenciaRegistro->bindParam(':Usuario', $customer_name);	
	$sentenciaRegistro->bindParam(':Correo', $customer_email);
	$sentenciaRegistro->bindParam(':Contrasena', $pwd);
	$sentenciaRegistro->bindParam(':Sexo', $sexo);
	$sentenciaRegistro->bindParam(':Edad', $edad);
	$sentenciaRegistro->bindParam(':API', $API);
	//captura de la informacion posteada por el formulario de la pagina registro.php
    
	//$public_key = $_POST['public_key'];
	//$product_price = $_POST['product_price'];
	//$product_name = $_POST['product_name'];
	//$product_id = $_POST['product_id'];
	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
	$pwd = $_POST['pwd'];
	$edad = $_POST['edad'];
	$sexo = $_POST['sexo'];
	//$customer_phone = $_POST['customer_phone'];
	//$image_url = $_POST['image_url'];
	//$success_url = $_POST['success_url'];
	//$failed_url = $_POST['failed_url'];
	$API = rand(0,100000);
	
	$formadepago = $_POST['formadepago'];
	
	$custom = 0;
	
	$sentenciaRegistro->execute();
	
	/*
	echo $public_key;
	echo $product_price;
	echo $product_name;
	echo $product_id;
	echo $customer_name;
	echo $customer_email;
	echo $pwd;
	echo $edad;
	echo $sexo;
	echo $customer_phone;
	echo $image_url;
	echo $success_url;
	echo $failed_url;
	echo $formadepago;
    */
	
	// forma de pago: paypal
	
	if($formadepago == "paypal"){
		
		$consultaSesion = "SELECT * FROM usuarios WHERE correo_usuario = ? AND contrasena = ?";
        $sentenciaSesion = $pdo->prepare($consultaSesion);
        $sentenciaSesion->bindParam(1,$customer_email);
        $sentenciaSesion->bindParam(2,$pwd);
        $sentenciaSesion->execute();                
        $resultado = $sentenciaSesion->fetch();
		if($resultado){
			$custom = $resultado['id_usuario'];
		}
		else{
			$error = "ERROR EN EL REGISTRO!!!".PHP_EOL;
			file_put_contents('paypal_dump.txt',$error,FILE_APPEND);
		}
		
	}

	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
    <!--

    -->
    
    <form action="https://compropago.com/comprobante" method="post" id="formaCompropago">
        <input type="hidden" name="public_key" value="pk_test_962f27606164387129">
        <input type="hidden" name="product_price" value="150.00">
        <input type="hidden" name="product_name" value="Membresia 1 mes">
        <input type="hidden" name="product_id" value="M1M">
        <input type="hidden" name="customer_name" value="<?php echo $customer_name ; ?>">
        <input type="hidden" name="customer_email" value="<?php echo $customer_email ; ?>">
        <input type="hidden" name="customer_phone" value="">
        <input type="hidden" name="image_url" value="">
        <input type="hidden" name="success_url" value="http://www.historietas.mx">
        <input type="hidden" name="failed_url" value="">
        <!--
        <input type="image" src="https://compropago.com/assets/payment-green-btn.png" border="0" name="submit" alt="Pagar con ComproPago">
        -->
    </form>
    
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" id="formaPaypal">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="B7U9YLYQRFDKS">
        <input type="hidden" name="custom" value="<?php echo $custom ; ?>"/>
        <!--
        <input type="image" src="https://www.sandbox.paypal.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        -->
    </form>
    
    <!-- script que manda la informacion del formulario automaticamente sin ninguna accion por parte del usuario -->
    <script type="text/javascript">
	    var formapago = <?php echo json_encode($formadepago); ?>;
		//document.write(formapago);
        //document.getElementById('formaCompropago').submit(); // SUBMIT FORM
		if(formapago == "compropago"){
			document.getElementById('formaCompropago').submit();
		}
		else if(formapago == "paypal"){
			document.getElementById('formaPaypal').submit();
		}
    </script>
    
</body>
</html>
