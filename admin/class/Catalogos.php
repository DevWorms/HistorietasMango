<?php 
	class Catalogos{
		private $pdo;
		function Catalogos($pdo){
			$this->pdo= $pdo;
		}

		function updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo){
			$query = "";
			$ejecuta = null;
			$nombreImagen = $imagen["name"];
			if($nombreImagen !=""){
				$cargar = new Archivos($imagen);
				$fullPathIMG = "Catalogo/";
				if($cargar->subirArchivo("../user/".$fullPathIMG)){
				$query = "UPDATE catalogo SET nombre_catalogo= ?, descripcion_catalogo= ?,imagen_catalogo= ? WHERE id_catalogo= ?";
				$fullPathIMG .= $imagen["name"];
				$ejecuta = $this->pdo->prepare($query);
				$ejecuta->bindParam(1,$nombre);
				$ejecuta->bindParam(2,$descripcion);
				$ejecuta->bindParam(3,$fullPathIMG);
				$ejecuta->bindParam(4,$id_catalogo);

				return $ejecuta->execute();
				}
				
			}else{
				$query = "UPDATE catalogo SET nombre_catalogo= ?, descripcion_catalogo= ? WHERE id_catalogo= ?";

				$ejecuta = $this->pdo->prepare($query);
				$ejecuta->bindParam(1,$nombre);
				$ejecuta->bindParam(2,$descripcion);
				$ejecuta->bindParam(3,$id_catalogo);

				return $ejecuta->execute();
			}
				
							
		}	
	}

 ?>