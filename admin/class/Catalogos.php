<?php 
	class Catalogos{
		private $pdo;
		private $archivo;
		function Catalogos(){
			$this->pdo= ConexionBD::obtenerInstancia()->obtenerBD();
		}

		function registrarCatalogo($nombre,$descripcion,$imagen){

			$query = "INSERT INTO catalogo (nombre_catalogo, descripcion_catalogo, imagen_catalogo,carpeta_cat_revistas)";
			$query .= " VALUES (?,?,?,?)";
			
			$foto = "";

			$path = "Catalogo/";
			$realPath = "../user/Catalogo/";
			$foto = "";
			$archivo = new Archivos($imagen,$realPath);
			if($imagen  !="" AND $archivo->subirArchivo() ){
				$foto = $path.$imagen['name'];
			}

			// creamos el path donde iran revistas asociadas
			
			$nombreCarpeta = ($this->getIdCatalogo() + 1 )."_".$archivo->getNombreValido($nombre);
			$pathRevistas = "../user/Revistas/";
			$pathCataloRev= "Revistas/".$nombreCarpeta;



			$stm = $this->pdo->prepare($query);
			$stm->bindParam(1,$nombre);
			$stm->bindParam(2,$descripcion);
			$stm->bindParam(3,$foto);
			$stm->bindParam(4,$pathCataloRev);

			// creamos sus carpetas
			if($stm->execute()){
				$pathFinal = $pathRevistas . $nombreCarpeta . "/";
				return ($archivo->crearCarpeta($pathRevistas,$nombreCarpeta) AND $archivo->crearCarpeta($pathFinal,"img") AND $archivo->crearCarpeta($pathFinal,"pdf"));
			}

			return false;
		}

		function updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo){

			$path = "Catalogo/";
			$realPath = "../user/Catalogo/";
			$imagen_catalogo = "";
			$archivo = new Archivos($imagen,$realPath);
			if($imagen  !="" AND $archivo->subirArchivo() ){
				$imagen_catalogo = $path.$imagen['name'];
			}
			
			$query = "UPDATE catalogo SET nombre_catalogo= ?, descripcion_catalogo= ? WHERE id_catalogo= ?";
			if($imagen_catalogo !=""){
				$query = "UPDATE catalogo SET nombre_catalogo= ?, descripcion_catalogo= ?,imagen_catalogo= ? WHERE id_catalogo= ?";
			}
			$ejecuta = $this->pdo->prepare($query);
			$ejecuta->bindParam(1,$nombre);
			$ejecuta->bindParam(2,$descripcion);

			if($imagen_catalogo !=""){
				$ejecuta->bindParam(3,$imagen_catalogo);
				$ejecuta->bindParam(4,$id_catalogo);
			}else{
				$ejecuta->bindParam(3,$id_catalogo);
			}
			

			return $ejecuta->execute();					
		}

		//funcion para el buscador de catalogos
		function buscarCatalogo($busqueda){

			$query = "SELECT * FROM catalogo WHERE ( ";
			$palabras = explode(" ",$busqueda);
			$cuantasPalabras = count($palabras);
			$criterios = "";
			for($cont =0; $cont < $cuantasPalabras ; $cont++){
				$criterios .= " nombre_catalogo LIKE ? OR ";
				if($cont == ($cuantasPalabras -1 )){
					$criterios .= " descripcion_catalogo LIKE ? ";
				}else{
					$criterios .= " descripcion_catalogo LIKE ? OR ";
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
		// funcion que elimina un catalogo 
		function eliminarCatalogo($id){
			$query = "DELETE FROM catalogos where id_catalogo ) ? ";
			$stm = $this->pdo->prepare($query);
			$stm->bindParam($id);
			return $stm->execute();
		}
		//obtiene el nombe de un catalogo y id 
		function getNombre($catalogo){
			$whichc_catalogo = $catalogo;
            $query = "SELECT id_catalogo,nombre_catalogo FROM catalogo";
            $ejecuta = $this->pdo->prepare($query);
            $ejecuta->execute();
            $rs =  $ejecuta->fetchAll();

            return $rs;
		}

		function getPathRevista($catalogo){
			$path = "";
            $query = "SELECT carpeta_cat_revistas as path FROM catalogo WHERE id_catalogo =  ?";
            $ejecuta = $this->pdo->prepare($query);
            $ejecuta->bindParam(1,$catalogo);
            $ejecuta->execute();
            $rs =  $ejecuta->fetchAll();
            foreach($rs as $row){
            	$path = $row['path'];
            }
            return $path;
		}

		// obtiene el ultimo catalog insertado
		function getIdCatalogo(){
			$catId = 0;
			$queryId = "SELECT max(id_catalogo) as id from catalogo";
			$stm = $this->pdo->prepare($queryId);
			$stm->execute();
			$rsId = $stm->fetchAll();
			foreach($rsId as $idFila){
				$catId= $idFila['id'];
			}
			return $catId;
		}
	}

 ?>