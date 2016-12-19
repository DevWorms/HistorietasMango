<?php 
	class Catalogos{
		private $pdo;
		function Catalogos($pdo){
			$this->pdo= $pdo;
		}

		function updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo){
			$query = "UPDATE catalogo SET nombre_catalogo= ?, descripcion_catalogo= ?,imagen_catalogo= ? WHERE id_catalogo= ?";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$nombre);
			$ejecuta->bindParam(2,$descripcion);
			$ejecuta->bindParam(3,$imagen);
			$ejecuta->bindParam(4,$id_catalogo);
			return $ejecuta->execute();
		}	
	}

 ?>