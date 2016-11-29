<?php
    date_default_timezone_set("America/Mexico_City");

	//$payment_status = 'Completed';
	//$id_Usuario = 155;
    $payment_status   = $_POST['payment_status'];
    $id_Usuario =  $_POST['custom'];

    $fecha = date("d/m/Y");
	$hora = date("h:i:sa");
	
	$registro = "\n" . $id_Usuario . " | " . $payment_status . " | " . $hora . " | " . $fecha . PHP_EOL;
	
	echo $registro;
	
	file_put_contents('paypal_dump.txt',$registro,FILE_APPEND);


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