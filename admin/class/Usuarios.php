<?php 
	// no es ruta directa es relativa quien llama esta clase usuarios.php
	require_once '../controladores/datos/ConexionBD.php';
	class Usuarios{
		private $pdo;
		function Usuarios(){
			$this->pdo = ConexionBD::obtenerInstancia()->obtenerBD();
		}

		//Obtiene html con los administradores actuales
		function  showAdministradores($parametro){
			$parametro .="%"; 
			$query = "";
			if($parametro != ""){
				$query = "SELECT nombre_usuario,correo_usuario,contrasena FROM administrador WHERE  correo_usuario LIKE ?  or nombre_usuario LIKE ?";
				$ejecuta = $this->pdo->prepare($query);
				$ejecuta->bindParam(1,$parametro);
				$ejecuta->bindParam(2,$parametro);
			}else{
				$query = "SELECT nombre_usuario,correo_usuario,contrasena FROM administrador";
				$ejecuta = $this->pdo->prepare($query);
			}
			$ejecuta->execute();
			$rs =  $ejecuta->fetchAll();
			// solo devolvere <tr> para poder agregar estilos en el html}
			$finalContent = "";
			foreach ($rs as $row) {
				$nombre_usuario = $row['nombre_usuario'];
				$correo_usuario = $row['correo_usuario'];
				$contrasena = $row['contrasena'];
				$finalContent .= "<tr><td>".$nombre_usuario."</td><td>".$correo_usuario."</td><td>".$contrasena."</td></tr>";
			}
			return $finalContent;
		}

		function saveAdmistrador($nombre_usuario,$correo_usuario,$contrasena){
			$query = "INSERT INTO administrador(nombre_usuario,correo_usuario,contrasena) values(?,?,?)";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$nombre_usuario);
			$ejecuta->bindParam(2,$correo_usuario);
			$ejecuta->bindParam(3,$contrasena);
			return $ejecuta->execute();
		}
	}

 ?>