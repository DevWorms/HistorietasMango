<?php 
/**
	 * De Devworms
	 * Codificado por Andrew Alan Gonzalez Miranda
	 */
	class Archivos{

		private $archivo;
		private $destino;
		public $rutaGuarda;
		function Archivos($file,$ruta){
			// la clase archivos trabaja con un parametro al llamarlo este sera sustituido por $_FILES["miArchivo"] 
			$this->archivo = $file;
			$this->destino = $ruta;
		}

		 function bolError(){
			return $this->archivo['error'];
		}

		function subirArchivo(){

			//este carga el archivo y devolvera true o false por si se requiere para valdiar y hacer mas operaciones
			if($this->bolError() == 0){
				//informacion del archivo
               	$nombre = $this->archivo['name'];
               	
                //$extension = "." . end(explode('.',$nombre)); 
                //creamos la ruta
                $url = $this->destino . $nombre;
               //cargamos el archivo
               	$response = @move_uploaded_file($this->archivo["tmp_name"], $url);
               //verificamos la carga
               if($response){
               	$this->rutaGuarda = $this->destino . $nombre;
               	return true;
               }
			}else{
				return  false;
			}

			return false;
		}

		function crearCarpeta($ruta,$nombre){
			$full_create = $ruta.$nombre;
			return mkdir($full_create, 0777, true);
		}

		function renameCarpeta($oldName,$newName,$ruta){
			return rename($ruta.$oldName , $ruta.$newName);
		}

		function getNombreValido($cadena){
			$patron = '[\W]';
			$sustitucion = ''; 
			return preg_replace($patron, $sustitucion, $cadena);
		}
	}


 ?>