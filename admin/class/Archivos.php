<?php 
	class Archivos{

		private $archivo;

		function Archivos($file){
			// la clase archivos trabaja con un parametro al llamarlo este sera sustituido por $_FILES["miArchivo"] 
			$this->archivo = $file;
		}

		 function bolError(){
			//esta funcion retornar los errores encontrados en el archivo
			
			return $this->archivo['error'];
		}

		function subirArchivo($destino){

			//este carga el archivo y devolvera true o false por si se requiere para valdiar y hacer mas operaciones
			if($this->bolError() == 0){
				//informacion del archivo
				$ruta = $destino;   
               	$nombre = $this->archivo['name'];
                $extension = "." . end(explode('.',$nombre)); 
                //creamos la ruta
                $url = $ruta . $nombre;
               //cargamos el archivo
               	$response = @move_uploaded_file($this->archivo["tmp_name"], $url);
               //verificamos la carga
               if($response){
               	return true;
               }
			}else{
				echo "ERROR : ". $this->bolError();	
			}

			return false;
		}
	}
 ?>