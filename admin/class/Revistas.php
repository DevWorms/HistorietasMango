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
			$validador = 0;
			// le quitamos la coma del final a cada cadena
			$activadas = trim($activadas,",");
			$desactivadas = trim($desactivadas,",");
			$eliminadas = trim($eliminadas,",");
			echo $activadas;
			echo $desactivadas;
			// primero eliminamos para no efectar cambios de activiacion a id inexistente
			
			$query = "DELETE FROM revistas WHERE id_revista in( ? )";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$eliminadas);
			if($ejecuta->execute()){
				$validador += 1;
			}

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

			return $validador;

		}

		function saveRevista(){
			//recibo parametros
			$nombre_revista = $_POST['nombre_revista'];
			$info_revista = $_POST['info_revista'];
			$catalogo = $_POST['catalogo'];
			$numero_revista = $_POST['numero_revista'];
			$activo = $_POST['activo'];
			$imagen_revista = $_FILES['imagen_revista'];
			$documento_revista = $_FILES['documento_revista'];
			if($activo =="on"){
				$activo = 1;
			}else{
				$activo = 0;
			}			
			//objeto para subir archivos
			$loader = new Archivos($imagen_revista);

			//primero subimos los archivos y validamos antes de insertar a la BD
			if($loader->subirArchivo("files/revistas/img/")){
				$loader = new Archivos($documento_revista);
				if($loader->subirArchivo("files/revistas/documento/")){
					$query = "INSERT INTO revistas(id_catalogo,nombre_revista,numero_revista,info_revista,img_revista,pdf_revista,activo) VALUES(?,?,?,?,?,?,?)";
					$ejecuta = $this->pdo->prepare($query);
					$ejecuta->bindParam(1,$catalogo);
					$ejecuta->bindParam(2,$nombre_revista);
					$ejecuta->bindParam(3,$numero_revista);
					$ejecuta->bindParam(4,$info_revista);
					$ejecuta->bindParam(5,$imagen_revista['name']);
					$ejecuta->bindParam(6,$documento_revista['name']);
					$ejecuta->bindParam(7,$activo);
					if($ejecuta->execute()){
						return true;
					}
				}
			}
		return false;
		}
	}

 ?>