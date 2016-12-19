<?php
    
    //  LLAMAR BASE DE DATOS E INSTANCIAR PDO
    require_once '../controladores/datos/ConexionBD.php';
    session_start();
    $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

    //SE COMPRUEBA SI HUBO UN ERROR AL SUBIR EL DOCUMENTO.
    if ($_FILES["documento"]["error"] > 0)  {
    	
            echo '<script>
                    if (confirm("Hubo un error al cargar tu archivo") == true) {
                    } else {
                    }
               </script>';  

    }    else {

                //  OBTENER INFORMACIÓN DEL FORMULARIO DEL DOCUMENTO
                $texto1 = $_POST['texto1'];
                $texto2 = $_POST['texto2'];
                $texto3 = $_POST['texto3'];

                // OBTENER INFORMACIÓN DEL DOCUMENTO DIGITAL
                $ruta = "../documentos/";   //Ruta donde se almacenará el documento
                $nombre_documento = $_FILES['documento']['name'];   //Obtener el nombre del documento
                $extension = "." . end(explode('.',$nombre_doc));   //Se obtiene la extensión del documento (pdf, img, png, etc)

                //  CREAR RUTA Y NOMBRE DEL DOCUMENTO
                $url = $ruta . $carpeta . $extension;

                //  MOVER ARCHIVO A URL EN CARPETA
                $resultado = @move_uploaded_file($_FILES["documento"]["tmp_name"], $url);

                    //  CORROBORAR SI EL ARCHIVO SE OBTUVO SATISFACTORIAMENTE
                    if ($resultado)  {

                        
                        //  QUERY PARA ALMACENAR INFORMACIÓN DEL DOCUMENTO
                        $consulta = "INSERT INTO documentos(texto1, texto2, texto3, ruta) 
                                         VALUES (?,?,?)";

                        $sentencia2 = $pdo->prepare($consulta);
                            $sentencia2->bindParam(1,$texto1);
                            $sentencia2->bindParam(2,$texto2);
                            $sentencia2->bindParam(3,$texto3);
                            $sentencia2->bindParam(4,$url);
                        $sentencia2->execute();   
          
                        echo '<script>
                                if (confirm("Tu archivo fue enviado exitosamente, revisa tu historial para conocer su estado. Folio: ' . $folio . '") == true) {
                                } else {
                                }
                           </script>';

                    }  else   {   
                      
                            echo '<script>
                                    if (confirm("El archivo no fue copiado; consulta si hay errores en el mismo. Solamente aceptamos Word y PDF") == true) {
                                    } else {
                                    }
                               </script>';  
                       }
        }

?>