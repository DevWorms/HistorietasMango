<?php

    require_once '../datos/ConexionBD.php';
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	
	$fecha = date("d/m/Y");
	$hora = date("h:i:sa");
    $payment_status   = $_POST['payment_status'];
    $id_Usuario =  $_POST['custom'];
	
	if($payment_status == "Completed"){
		$consultaUsuario = "SELECT * FROM usuarios WHERE id_usuario = ?";
		$sentenciaSesion = $pdo->prepare($consultaUsuario);
        $sentenciaSesion->bindParam(1,$id_Usuario);
		$sentenciaSesion->execute();                
        $resultado = $sentenciaSesion->fetch();
		if ($resultado){
			$premium = $resultado['premium'];
			$premium = ($premium + 1);
			$sentenciaUpdate = $pdo->prepare("UPDATE usuarios SET premium = '$premium' WHERE id_usuario = '$id_Usuario'");
		    $sentenciaUpdate->execute();
			
			$registro = $id_Usuario . " | " . $payment_status . " | " . $hora . " | " . $fecha . " -- EXITO!!!" . PHP_EOL;
			file_put_contents('paypal_dump.txt',$registro,FILE_APPEND);
			
		}
		else{

			$registro = $id_Usuario . " | " . $payment_status . " | " . $hora . " | " . $fecha . " -- Sin registro en la BD!!!" . PHP_EOL;
			file_put_contents('paypal_dump.txt',$registro,FILE_APPEND);
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
</body>
</html>