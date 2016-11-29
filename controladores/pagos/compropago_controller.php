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
    $public_key = $_POST['public_key'];
	$product_price = $_POST['product_price'];
	$product_name = $_POST['product_name'];
	$product_id = $_POST['product_id'];
	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
	$pwd = $_POST['pwd'];
	$edad = $_POST['edad'];
	$sexo = $_POST['sexo'];
	$customer_phone = $_POST['customer_phone'];
	$image_url = $_POST['image_url'];
	$success_url = $_POST['success_url'];
	$failed_url = $_POST['failed_url'];
	
	$API = md5(microtime() . rand());
	
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
    */
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
    <form action="https://compropago.com/comprobante" method="post" id="formaCompropago">
        <input type="hidden" name="public_key" value="<?php echo $public_key ; ?>">
        <input type="hidden" name="product_price" value="<?php echo $product_price ; ?>">
        <input type="hidden" name="product_name" value="<?php echo $product_name ; ?>">
        <input type="hidden" name="product_id" value="<?php echo $product_id ; ?>">
        <input type="hidden" name="customer_name" value="<?php echo $customer_name ; ?>">
        <input type="hidden" name="customer_email" value="<?php echo $customer_email ; ?>">
        <input type="hidden" name="customer_phone" value="<?php echo $customer_phone ; ?>">
        <input type="hidden" name="image_url" value="<?php echo $image_url ; ?>">
        <input type="hidden" name="success_url" value="<?php echo $success_url ; ?>">
        <input type="hidden" name="failed_url" value="<?php echo $failed_url ; ?>">
        <!--
        <input type="image" src="https://compropago.com/assets/payment-green-btn.png" border="0" name="submit" alt="Pagar con ComproPago"> 
        -->
    </form>
    <!-- script que manda la informacion del formulario automaticamente sin ninguna accion por parte del usuario -->
    <script type="text/javascript">
        document.getElementById('formaCompropago').submit(); // SUBMIT FORM
    </script>
    
</body>
</html>
