<?php 
	class Muestras{
		
		private $pdo;
		private $archivo;

		function Muestras(){
			$this->pdo= ConexionBD::obtenerInstancia()->obtenerBD();
		}
		// buscador de muestras
		function buscarMuestra($busqueda){
			$query = "SELECT * FROM muestras WHERE ( ";
			$palabras = explode(" ",$busqueda);
			$cuantasPalabras = count($palabras);
			$criterios = "";
			for($cont =0; $cont < $cuantasPalabras ; $cont++){
				$criterios .= " titulo LIKE ? OR ";
				if($cont == ($cuantasPalabras -1 )){
					$criterios .= " descripcion LIKE ? ";
				}else{
					$criterios .= " descripcion LIKE ? OR ";
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

		// para registrar una nueva muestra
		function saveMuestra($nombre,$descripcion,$imagen,$documento,$activo){
			// es un checkbox
			if($activo =="on"){
				$activo = 1;
			}else{
				$activo = 0;
			}			
			// archivos
			//obtenemos el path para el catalogo destino
			
			$realPatPdf = "../Prueba/documento/";
			$realPathImg = "../Prueba/imagen/";


			$pdf = new Archivos($documento,$realPatPdf);
			$img = new Archivos($imagen,$realPathImg);

			if($imagen != "" AND $documento !="" AND $pdf->subirArchivo() AND $img->subirArchivo()){

			$query = "INSERT INTO muestras(titulo,descripcion,imagen,documento,activo) VALUES(?,?,?,?,?)";
				$full_pathIMG =  "Prueba/imagen/".$imagen['name'];
				$full_pathPDF =  "Prueba/documento/".$documento['name'];
				$ejecuta = $this->pdo->prepare($query);
				$ejecuta->bindParam(1,$nombre);
				$ejecuta->bindParam(2,$descripcion);
				$ejecuta->bindParam(3,$full_pathIMG);
				$ejecuta->bindParam(4,$full_pathPDF);
				$ejecuta->bindParam(5,$activo);

				return $ejecuta->execute();
			}
			
			return false;
		}

		//para modificar una muestra
		function modificaMuestra($nombre,$descripcion,$imagen,$documento,$activo,$id_muestra){
			// es un checkbox
			if($activo =="on"){
				$activo = 1;
			}else{
				$activo = 0;
			}			
			// archivos
			//obtenemos el path para el catalogo destino
			
			$realPatPdf = "../Prueba/documento/";
			$realPathImg = "../Prueba/imagen/";


			$pdf = new Archivos($documento,$realPatPdf);
			$img = new Archivos($imagen,$realPathImg);
			$bolImagen = false;
			$bolDoc = false;
			$query = "UPDATE  muestras SET titulo= ? ,descripcion = ?,activo = ? ";
			// si viene modifcacion de imagen o documento
			$full_pathIMG = "";
			$full_pathPDF = "";
			if($imagen != ""){
				$bolImagen = $img->subirArchivo();
				if($bolImagen){
					$query.= ", imagen = ? ";
					$full_pathIMG =  "Prueba/imagen/".$imagen['name'];
				}
			}

			if($documento != ""){
				$bolDoc = $pdf->subirArchivo();
				if($bolDoc){
					$query.= ", documento = ? ";
					$full_pathPDF =  "Prueba/documento/".$documento['name'];
				}
				
			}
				
			$query .= " WHERE id_muestra = ? ";
			$parametro = 1;
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam($parametro,$nombre);
			$parametro += 1;
			$ejecuta->bindParam($parametro,$descripcion);
			$parametro += 1;
			$ejecuta->bindParam($parametro,$activo);
			$parametro += 1;
			if($bolImagen){
				$ejecuta->bindParam($parametro,$full_pathIMG);
				$parametro += 1;
			}
			
			if($bolDoc){
				$ejecuta->bindParam($parametro,$full_pathPDF);
				$parametro += 1;
			}
			
			$ejecuta->bindParam($parametro,$id_muestra);
			return $ejecuta->execute();
			
		}
	}
 ?>