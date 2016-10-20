<?php
    require_once '../datos/ConexionBD.php';
	$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
	
	//$sentenciaUpdate = $pdo->prepare("UPDATE usuarios SET premium = '1' WHERE nombre_usuario = '$customer_name' AND correo_usuario = '$customer_email' ");
	
    /*
    * Agrega la URL donde se encuentre el webhook en:
    *      https://compropago.com/panel/webhooks 
    *
    * Este webhook ayuda a recibir la notificación para el caso en que
    * un pago haya sido generado o confirmado
    * 
    * Para más información visitar: https://compropago.com/documentacion/webhooks
    */
    // Capturando el objeto JSON
    $body = @file_get_contents('php://input'); 
    // Decodificando el objeto JSON
    $event_json = json_decode($body);          

    // Imprimiendo la respuesta, para probarlo (Para probar el webhook ir a: https://compropago.com/panel/webhooks) 
    echo $event_json->{'id'}.'<br>';
    echo $event_json->{'type'}.'<br>';
    echo $event_json->order_info->{'order_id'}.'<br>';
    echo $event_json->order_info->{'store'}.'<br>';
    echo $event_json->order_info->{'order_price'}.'<br>';
    echo $event_json->order_info->{'order_name'}.'<br>';
    echo $event_json->customer->{'customer_name'}.'<br>';
    echo $event_json->customer->{'customer_email'}.'<br>';
	
    // Almacenando los valores del JSON 
    $status = $event_json->{'type'};
    $product_id = $event_json->order_info->{'order_id'};
    $store = $event_json->order_info->{'store'};
    $product_price = $event_json->order_info->{'order_price'};
    $product_name = $event_json->order_info->{'order_name'};
    $customer_name = $event_json->customer->{'customer_name'};
    $customer_email = $event_json->customer->{'customer_email'};
	
	echo "<br>Status: ". $status;
	echo "<br>Product_id: ". $product_id;
	echo "<br>Store: " . $store;
	echo "<br>Product_price: " . $product_price;
	echo "<br>Product_name: " . $product_name;
	echo "<br>Customer_name: " . $customer_name;
	echo "<br>Customer_email: " . $customer_email;
	
	/*
	
	// Imprimiendo la respuesta, para probarlo (Para probar el webhook ir a: https://compropago.com/panel/webhooks) 
    echo $event_json->data->object->{'id'}.'<br>';
    echo $event_json->{'type'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_id'}.'<br>';
    echo $event_json->data->object->payment_details->{'store'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_price'}.'<br>';
    echo $event_json->data->object->payment_details->{'product_name'}.'<br>';
    echo $event_json->data->object->payment_details->{'customer_name'}.'<br>';
    echo $event_json->data->object->payment_details->{'customer_email'}.'<br>';
    // Almacenando los valores del JSON 
    $status = $event_json->{'type'};
    $product_id = $event_json->data->object->payment_details->{'product_id'};
    $store = $event_json->data->object->payment_details->{'store'};
    $product_price = $event_json->data->object->payment_details->{'product_price'};
    $product_name = $event_json->data->object->payment_details->{'product_name'};
    $customer_name = $event_json->data->object->payment_details->{'customer_name'};
    $customer_email = $event_json->data->object->payment_details->{'customer_email'}; 
    
    /* Objeto JSON que se envia  
    {
        "type": "charge.success",
        "object": "event",
        "data": {
            "object": {
                "id": "ch_00000-000-0000-000000",
                "object": "charge",
                "created": "2013-09-19T05:32:00.427Z",
                "paid": true,
                "amount": "12.00",
                "currency": "mxn",
                "refunded": false,
                "fee": "3.35",
                "fee_details": [{
                    "amount": "3.35",
                    "currency": "mxn",
                    "type": "compropago_fee",
                    "description": "Honorarios de ComproPago",
                    "application": null,
                    "amount_refunded": 0
                }],
                "payment_details": [{
                    "object": "cash",
                    "store": "Oxxo",
                    "country": "MX",
                    "product_id": "test_12",
                    "product_price": "12.00",
                    "product_name": "Chocolate",
                    "image_url": "http://upload.wikimedia.org/wikipedia/commons/5/56/Chocolate_cupcakes.jpg",
                    "success_url": "http://example.com/success",
                    "failded_url": "http://example.com/failed",
                    "customer_name": "Francisco Ortiz",
                    "customer_email": "francisco@example.com",
                    "customer_phone": "5555555555"
                }],
                "captured": true,
                "failure_message": null,
                "failure_code": null,
                "amount_refunded": 0,
                "description": "Estado del pago - ComproPago",
                "dispute": null
            }
        }
    }
    */
	
	if($status == "charge.success"){
		$sentenciaUpdate = $pdo->prepare("UPDATE usuarios SET premium = '1' WHERE nombre_usuario = '$customer_name' AND correo_usuario = '$customer_email' ");
		$sentenciaUpdate->execute();
		echo "<br><br>Correo:" . $customer_name . "<br>Email:" . $customer_email;
		echo "<br><br><br>Actualizacion de la base de datos completa";
	}else
	{
		echo "<br><br><br>Sin cambios en la base de datos...";
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