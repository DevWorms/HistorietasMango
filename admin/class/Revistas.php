	<?php 
		class Revistas{
			private $pdo;
			function Revistas(){
				$this->pdo= ConexionBD::obtenerInstancia()->obtenerBD();
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
				$validador = 1;

				// le quitamos la coma del final a cada cadena
				$activadas = trim($activadas,",");
				$desactivadas = trim($desactivadas,",");
				$eliminadas = trim($eliminadas,",");

				//para recibir los numero limpios y aplicarlos los pasamos a lugares en array para iterarlos
				$arr_act = explode(",", $activadas);
				$arr_des = explode(",", $desactivadas);
				$arr_del = explode(",", $eliminadas);


				// primero eliminamos para no efectar cambios de activiacion a id inexistente

				foreach ($arr_del as  $revista) {
					$query = "DELETE FROM revistas WHERE id_revista in(?);";
					$ejecuta = $this->pdo->prepare($query);
					$ejecuta->bindParam(1,$revista);
					if($ejecuta->execute()){
						$validador *= 1;
					}else{
						$validador *= 0;
					}
				}
				

				// ahora desactivamos las que hayan sido desactivad primero
				foreach ($arr_des as $revista) {
					$query = "UPDATE revistas SET activo= 0 WHERE id_revista in(?);";
					$ejecuta = $this->pdo->prepare($query);
					$ejecuta->bindParam(1,$revista);
					if($ejecuta->execute()){
						$validador *= 1;
					}else{
						$validador *= 0;
					}
				}
				
				// por ultimo activamos las que se pusiero nen true el check
				foreach ($arr_act as $revista) {
					$query = "UPDATE revistas SET activo= 1 WHERE id_revista in(?);";				
					$ejecuta = $this->pdo->prepare($query);
					$ejecuta->bindParam(1,$revista);
					if($ejecuta->execute()){
						$validador *= 1;
					}else{
						$validador *= 0;
					}
				}
				

				return $validador;

			}

			function saveRevista($id_catalogo,$nombre_revista,$numero_revista,$info_revista,$img_revista,$pdf_revista,$activo){
				$catalogo = new Catalogos();
				// es un checkbox
				if($activo =="on"){
					$activo = 1;
				}else{
					$activo = 0;
				}			
				// archivos
				//obtenemos el path para el catalogo destino
				
				$realPatPdf = "../user/".$catalogo->getPathRevista($id_catalogo) . "/pdf"."/";
				$realPathImg = "../user/".$catalogo->getPathRevista($id_catalogo) . "/img"."/";


				$pdf = new Archivos($pdf_revista,$realPatPdf);
				$img = new Archivos($img_revista,$realPathImg);

				if($img_revista != "" AND $pdf_revista !="" AND $pdf->subirArchivo() AND $img->subirArchivo()){

				$query = "INSERT INTO revistas(id_catalogo,nombre_revista,numero_revista,info_revista,img_revista,pdf_revista,activo) VALUES(?,?,?,?,?,?,?)";
					$full_pathIMG = $catalogo->getPathRevista($id_catalogo) ."/". "img/".$img_revista['name'];
					$full_pathPDF = $catalogo->getPathRevista($id_catalogo) ."/". "pdf/". $pdf_revista['name'];
					$ejecuta = $this->pdo->prepare($query);
					$ejecuta->bindParam(1,$id_catalogo);
					$ejecuta->bindParam(2,$nombre_revista);
					$ejecuta->bindParam(3,$numero_revista);
					$ejecuta->bindParam(4,$info_revista);
					$ejecuta->bindParam(5,$full_pathIMG);
					$ejecuta->bindParam(6,$full_pathPDF);
					$ejecuta->bindParam(7,$activo);

					return $ejecuta->execute();
				}
				return false;
			}
		}

	 ?>