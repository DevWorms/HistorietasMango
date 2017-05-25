<?php 
	class Response{

		public $msjSuccess;
		public $msjFail;
		public $url;
		public $operacion;

		//propiedades necesarias para el objeto
		function Response($url, $operacion){
			if($operacion){
				$this->operacion = 1;
			}else{
				$this->operacion = 0;
			}
			
			$this->url = $url;

		}

		function redirect(){

			$this->url = $this->getUrlBase() . $this->url; 
			// ya que devuelven la busqueda con espacios quitamos los espacion blancos
			$this->url = str_replace(" ","+",$this->url);
			//validamos que sea url valido
			if(filter_var($this->url, FILTER_VALIDATE_URL) == true){
				//validacion para mensaje nulo pone default si el mensaje no esta vacio pone el llenado
				
				if($this->msjSuccess == ""){
					$this->msjSuccess = "GUARDÓ CON ÉXITO";
				} 

				if ($this->msjFail == ""){
					$this->msjFail = "OPERACIÓN NO EXITOSA";
				}

				$mensajFinal = "";

				if($this->operacion == 1){
					$mensajFinal = $this->msjSuccess;
				}else if($this->operacion == 0){
					$mensajFinal = $this->msjFail;
				}
				//ponemos el mensaje y el resultado de la operacion en la sesion
				$_SESSION["messageStatus"] = $mensajFinal;
				$_SESSION['op']= $this->operacion;
				
				$redirection = "Location: " .$this->url ;
				//redireccionamos
				header($redirection);
				
			}
			
		}

		//obtiene el url base para solo mandar la pagina que nesecitamos en el constructor
		function getUrlBase(){
			$origen = sprintf(
			"%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
			);

			$urls = explode("TransactionsAdmin",$origen);

			if(count($urls) <= 1){

				$urls = explode("Transactions",$origen);
			}
			$base = $urls[0];

			return $base;
		}

	}
 ?>