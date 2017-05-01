<?php 
	class Muestras{
		
		private $pdo;
		private $archivo;

		function Muestras(){
			$this->pdo= ConexionBD::obtenerInstancia()->obtenerBD();
		}
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
	}
 ?>