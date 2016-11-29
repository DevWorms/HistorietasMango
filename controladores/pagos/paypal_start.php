<?php
    
    require '..\..\vendor\autoload.php';
	
	//define('SITE_URL','https://www.historietas.mx');
	define('SITE_URL','https://192.168.1.65/HistorietasMango/');
	
	
	$paypal = new \PayPal\Rest\ApiContext(
	        new \PayPal\Auth\OAuthTokenCredential(
			    'ARHqTYmE_MXNmgJruZ5KcHGl8yzoJJE8lUsYz_q466E1XSy994rz9UwSEvjODwbZZjoHBUK8lTNnTaZu',
				'EDxhy9vH9orCUMxeOmyPALRf0GGieeFyXDMVv9KjeT0YHuwV6Uu8NHM3-We0XaX1DdeXhijLEXscyZi5'
			)//Credenciales en modo de prueba, cambiar cuando se lance el sitio web
	);
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