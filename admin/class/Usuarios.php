<?php 
	class Usuarios{
		private $pdo;
		function Usuarios(){
			$this->pdo = ConexionBD::obtenerInstancia()->obtenerBD();
		}

		//Obtiene html con los administradores actuales
		function  buscaAdministradores($busqueda){
			$query = "SELECT * FROM administrador WHERE ( ";
			$palabras = explode(" ",$busqueda);
			$cuantasPalabras = count($palabras);
			$criterios = "";
			for($cont =0; $cont < $cuantasPalabras ; $cont++){
				$criterios .= " nombre_usuario LIKE ? OR ";
				if($cont == ($cuantasPalabras -1 )){
					$criterios .= " correo_usuario LIKE ? ";
				}else{
					$criterios .= " correo_usuario LIKE ? OR ";
				}
				
			}
			
			$query .= $criterios . ") ";
			$stm = $this->pdo->prepare($query);

			$palabrasPorCriterio = $cuantasPalabras * 2;
			$position = 0;
			for($c=1 ; $c <= $palabrasPorCriterio; $c++ ){
				if((($c - 1)  % 4) == 0 ){
					if($c != 1){
						$position++;
					}	
				}
				$tempParametro = '%'.$palabras[$position].'%';
				$stm->bindParam($c,$tempParametro);	
			}

			$stm->execute();

			return $stm->fetchAll();
		}

		function saveAdmistrador($nombre_usuario,$correo_usuario,$contrasena){
			$query = "INSERT INTO administrador(nombre_usuario,correo_usuario,contrasena) values(?,?,?)";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$nombre_usuario);
			$ejecuta->bindParam(2,$correo_usuario);
			$ejecuta->bindParam(3,$contrasena);
			return $ejecuta->execute();
		}

		function eliminaAdmin($admin){
			$query = "DELETE FROM administrador where id_usuario = ? ";
			$stm = $this->pdo->prepare($query);
			$stm->bindParam(1,$admin);
			return $stm->execute();
		}
	}

 ?>