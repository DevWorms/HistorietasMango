<?php 

	class Revistas{
		private $pdo;
		function Revistas($objBd){
			$this->pdo = $objBd;
		}

		function getRevisByCatalogo($id_catalogo){
			$query = "SELECT nombre_revista,numero_revista,img_revista,pdf_revista,activo FROM revistas WHERE  id_catalogo= ?";
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$id_catalogo);
			$ejecuta->execute();
			$rs =  $ejecuta->fetchAll();
			return $rs;
		}
	}

 ?>