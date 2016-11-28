<?php
    //registro del usuario en la base de datos
    require_once '../datos/ConexionBD.php';
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	
	$nombre = $_POST['nombre'];
	$mail = $_POST['mail'];

	header("../../muestra.php");
?>
