<?php

    require_once '../datos/ConexionBD.php';
	
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	
	$consultaUsuario = "SELECT * FROM wallett WHERE id_usuario = '2'";
	$sentenciaSesion = $pdo->prepare($consultaUsuario);
	$sentenciaSesion->execute();                
    $resultado = $sentenciaSesion->fetch();
	if($resultado){
		echo "Registro encontrado <br><br>";
		$fecha = $resultado['fecha_caducidad'];
		echo $fecha . "<br><br>";
$sentenciaUpdate = $pdo->prepare("UPDATE wallett SET fecha_caducidad = NOW() WHERE id_usuario = '2'");
		$sentenciaUpdate->execute();
        $sentenciaUpdate = $pdo->prepare("UPDATE wallett SET fecha_caducidad = DATE_ADD(fecha_caducidad, INTERVAL 30 DAY) WHERE id_usuario = '2'");
		$sentenciaUpdate->execute();
		echo "sentenciaUpdate actualizada con exito!!!";
	}else {
		echo "Sin registro en la BD!!!...";
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