<?php 
	error_reporting(E_ALL);
	require_once 'class/login_mysql.php';
	require_once 'class/ConexionBD.php';
	require_once 'class/Archivos.php';
	require_once 'class/Catalogos.php';
	require_once 'class/Revistas.php';
	require_once 'class/Response.php';
	require_once 'class/Usuarios.php';
	require_once 'class/Muestras.php';
	session_start();

    if(isset($_SESSION["Id"]) and $_SESSION["Id"] != "" and $_SESSION["Id"] !=0){
	if(isset($_GET['modulo'])){
		$modulo = $_GET['modulo'];
		// variables de direccionamiento de paginas
		$dirCatalogos = "WebMaster.php?modulo=catalogos";
		$dirRevistas = "WebMaster.php?modulo=revistas";
		$dirUpRevistas = "WebMaster.php?modulo=upRevista";
		$dirUsuarios= "WebMaster.php?modulo=usuarios";
		$dirMuestra = "WebMaster.php?modulo=muestras";
		if($modulo == "buscarCat"){ // busca catalogos

			$busqueda = $_POST['busquedaCat'];
			$url = $dirCatalogos."&searchCat=".$busqueda;

			$response = new Response($url,true);
			$response->msjSuccess = "Busqueda finalizada";
			$response->redirect();

		}else if($modulo == "saveRevistaCat"){ // guarda los ajustes a revistas desde catalogo

			$saveRevista = new Revistas();
            $activadas = $_POST['activadas'];
            $desactivadas = $_POST['desactivadas'];
            $eliminadas = $_POST['eliminadas'];
            $guardo = $saveRevista->saveCambiosDinamicos($activadas,$desactivadas,$eliminadas);
            $url = $dirCatalogos."&searchCat=".$busqueda;
			$response = new Response($url,$guardo);
			$response->redirect();

		}else if($modulo == "modificaCat"){ // guarda modificaciones catalogo

            $catalogo = new Catalogos();
            $nombre = $_POST['nombre_catalogo'];
            $descripcion = $_POST['descripcion_catalogo'];
            $imagen = "";
            if(isset($_FILES['imagen_catalogo'])){
            	$imagen = $_FILES['imagen_catalogo'];
            }
            
            $id_catalogo = $_POST['id_catalogo'];
            $bolGuardo = false;
            $bolGuardo = $catalogo->updateCatalogo($nombre,$descripcion,$imagen,$id_catalogo);
            $url = $dirCatalogos."&searchCat=".$busqueda;
			$response = new Response($url,$bolGuardo);
			$response->redirect();
		}else if($modulo == "registraCat"){ // guarda un nuevo catalogo

			$nombre = $_POST['nombre_catalogo'];
			$descripcion = $_POST['descripcion_catalogo'];
			$imagen = "";
			if(isset($_FILES['imagen_catalogo'])){
				$imagen = $_FILES['imagen_catalogo'];
			}
			
			$catalogos = new Catalogos();
			$bolGuardo= $catalogos->registrarCatalogo($nombre, $descripcion, $imagen);
			$url = $dirCatalogos."&searchCat=".$nombre;
			$response = new Response($url,$bolGuardo);
			$response->msjSuccess = "Se agrego el catálogo";
			$response->redirect();

		}else if($modulo == "saverevistas"){ // guarda una revista 
				$nombre_revista = $_POST['nombre_revista'];
				$info_revista = $_POST['info_revista'];
				$catalogo = $_POST['catalogo'];
				$numero_revista = $_POST['numero_revista'];
				$activo = "";
				if(isset($_POST['activo'])){
					$activo = $_POST['activo'];
				}
				
				$imagen_revista = "";
				$documento_revista = "";
				if(isset($_FILES['imagen_revista'])){
					$imagen_revista = $_FILES['imagen_revista'];
				}

				if($_FILES['documento_revista']){
					$documento_revista = $_FILES['documento_revista'];
				}	

				$revista = new Revistas();
				$op = $revista->saveRevista($catalogo, $nombre_revista, $numero_revista, $info_revista, $imagen_revista, $documento_revista, $activo);

				$url = $dirRevistas;
				$response = new Response($url,$op);
				$response->redirect();

		}else if($modulo == "saveUsuario"){
			$admins = new Usuarios();
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $bolGuardo = $admins->saveAdmistrador($nombre,$correo,$contrasena);
            $url = $dirUsuarios;
			$response = new Response($url,$bolGuardo);
			$response->redirect();
		}else if($modulo == "buscarAdmins"){
			$busqueda = $_POST['busqueda_admin'];
			$url = $dirUsuarios."&busqueda_admin=".$busqueda;;
			$response = new Response($url,true);
			$response->msjSuccess = "Busqueda finalziada";
			$response->redirect();
		}else if($modulo == "borrarAdmin"){
			$admin_id = $_GET['id'];
			$admins = new Usuarios();
			$bolGuardo = $admins->eliminaAdmin($admin_id);
            $url = $dirUsuarios;
			$response = new Response($url,$bolGuardo);
			$response->msjSuccess = "Administrador eliminado con éxito";
			$response->redirect();
		}else if($modulo == "buscaMuestra"){
			$busqueda = $_POST['busquedaMuestra'];
			$url = $dirMuestra."&searchMuestra=".$busqueda;
			$response = new Response($url,true);
			$response->msjSuccess = "Busqueda finalizada";
			$response->redirect();
		}else if($modulo == "registrarMuestra"){ // guarda una revista 
				$nombre = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];

				$activo = "";
				if(isset($_POST['activo'])){
					$activo = $_POST['activo'];
				}
				
				$imagen = "";
				$documento = "";
				
				if(isset($_FILES['imagen'])){
					$imagen = $_FILES['imagen'];
				}

				if($_FILES['documento']){
					$documento = $_FILES['documento'];
				}	

				$muestra = new Muestras();
				$bolGuardo = $muestra->saveMuestra($nombre, $descripcion, $imagen, $documento, $activo);

				$url = $dirMuestra . "&searchMuestra=" . $nombre;
				$response = new Response($url,$bolGuardo);
				$response->msjSuccess = "Se guardó la muestra";
				$response->redirect();

		}else if($modulo == "modificaMu"){ // guarda modificaciones muestra
				$nombre = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$activo = "";
				if(isset($_POST['activo'])){
					$activo = $_POST['activo'];
				}
				
				$imagen = "";
				$documento = "";
				if(isset($_FILES['imagen'])){
					$imagen = $_FILES['imagen'];
				}

				if($_FILES['documento']){
					$documento = $_FILES['documento'];
				}	
				$id_muestra = $_POST['id_muestra'];
				$muestra = new Muestras();
				$bolGuardo = $muestra->modificaMuestra($nombre, $descripcion, $imagen, $documento, $activo,$id_muestra);

				$url = $dirMuestra . "&searchMuestra=" . $nombre;
				$response = new Response($url,$bolGuardo);
				$response->msjSuccess = "Se modifico la muestra";
				$response->redirect();
           
		}else if($modulo=="eliminaMu"){
			$idMuestra = $_GET['id'];
			$muestra = new Muestras();
			$bolGuardo = $muestra->eliminaMuestra($idMuestra);
			$url = $dirMuestra;
			$response = new Response($url,$bolGuardo);
			$response->msjSuccess = "Se eliminó la muestra";
			$response->redirect();

		}else if($modulo=="eliminaCat"){
			$idCat = $_GET['id'];
			$catalogos = new Catalogos();
			$bolGuardo = $catalogos->eliminarCatalogo($idCat);
			$url = $dirCatalogos;
			$response = new Response($url,$bolGuardo);
			$response->msjSuccess = "Se eliminó el catalogo";
			$response->redirect();
			
		}else if($modulo == "modificaRevista"){
			$catalogo = $_POST['id_catalogo'];
			$id_revista = $_POST['id_revista'];
			$nombre_revista = $_POST['nombre_revista'];
			$info_revista = $_POST['info_revista'];
			$numero_revista = $_POST['numero_revista'];
			$activo = "";
			if(isset($_POST['activo'])){
				$activo = $_POST['activo'];
			}
			
			$imagen_revista = "";
			$documento_revista = "";
			if(isset($_FILES['imagen_revista'])){
				$imagen_revista = $_FILES['imagen_revista'];
			}

			if($_FILES['documento_revista']){
				$documento_revista = $_FILES['documento_revista'];
			}	

			$revista = new Revistas();
			$op = $revista->updateRevista($catalogo, $nombre_revista, $numero_revista, $info_revista, $imagen_revista, $documento_revista, $activo,$id_revista);

			$url = $dirUpRevistas . "&id_revista=".$id_revista;
			$response = new Response($url,$op);
			$response->redirect();

		}

	}
}
 ?>