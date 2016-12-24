<?php 

	class Revistas{
		private $pdo;
		function Revistas($objBd){
			$this->pdo = $objBd;
		}

		function getRevisByCatalogo($id_catalogo){
			// funcion que devuelve las revistas pro catalogo
			$query = "SELECT id_revista,nombre_revista,numero_revista,img_revista,pdf_revista,activo FROM revistas WHERE  id_catalogo= ?";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$id_catalogo);
			$ejecuta->execute();
			$rs =  $ejecuta->fetchAll();
			return $rs;
			
		}

		function saveCambiosDinamicos($activadas,$desactivadas,$eliminadas){
			error_reporting(1);
			$validador = 0;
			// le quitamos la coma del final a cada cadena
			$activadas = trim($activadas,",");
			$desactivadas = trim($desactivadas,",");
			$eliminadas = trim($eliminadas,",");
			echo $activadas;
			echo $desactivadas;
						// primero eliminamos para no efectar cambios de activiacion a id inexistente
			/*$query = "DELETE FROM revistas WHERE id_revista in( ? )";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$eliminadas);
			if($ejecuta->execute()){
				$validador += 1;
			}*/

			// ahora desactivamos las que hayan sido desactivad primero
			$query = "UPDATE revistas SET activo= 0 WHERE id_revista in( ? )";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$desactivadas);
			if($ejecuta->execute()){
				$validador += 1;
			}


			// por ultimo activamos las que se pusiero nen true el check
			$query = "UPDATE revistas SET activo= 1 WHERE id_revista in( ? )";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$activadas);
			if($ejecuta->execute()){
				$validador += 1;
			}

			return 3;

		}

		function saveRevistar(){
			
		}
	}

 ?>