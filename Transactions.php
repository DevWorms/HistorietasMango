<?php 
session_start();
require_once 'controladores/suscripcion_usuario/SuscripcionUsuario.php';
require_once 'admin/class/Response.php';
	
	if(isset($_GET['modulo'])){

		$modulo = $_GET['modulo'];

		if($modulo == "boletin"){

            $nombre = $_POST["nombre"];
            $mail=$_POST["mail"];

            $objeto = new SuscripcionUsuario();
            $msj = $objeto->suscibe($nombre,$mail);
            header("Location: https://goo.gl/d6KYgK");
            /*$response = new Response("muestra.php",true);
            $response->msjSuccess = $msj;
            $response->redirect();*/
		}

	}

 ?>