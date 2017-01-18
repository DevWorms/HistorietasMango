    <?php
      require_once '../controladores/datos/ConexionBD.php';
      $pdo = ConexionBD::obtenerInstancia()->obtenerBD();


//++++++++++++++++++++++++++++++++++++++++++       MASTER      +++++++++++++++++++++++++++++++++++++++++++++
        
        function MostrarNovedades($id_catalogo) {
            global $pdo;

            $operacion = "SELECT * FROM revistas WHERE id_catalogo = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id_catalogo);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();

            foreach ($resultado as $fila) {

                            $id_revista = $fila["id_revista"];
                            $nombre_revista = $fila["nombre_revista"];
                            $numero_revista = $fila["numero_revista"];
                            $info_revista = $fila["info_revista"];
                            $img_revista = $fila["img_revista"];                        
                            $activo = $fila["activo"];

                            if($activo == 1){

                                echo '
                                    <div class="card">
                                        <a href="revista.php?id_revista=' . $id_revista .'"><img src="'. $img_revista .'" style="width:100%; box-shadow: 10px 10px 5px rgba(51, 51, 51, 0.6);"></a>
                                        <div class="container">
                                            <div id="super" class="comix">
                                                <h4><b> #' . $numero_revista . " " . $nombre_revista . '</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                ';

                            }


                        }

        }

        function MostrarRevista($id_revista) {
            global $pdo;

            $operacion = "SELECT pdf_revista, nombre_revista FROM revistas WHERE id_revista = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id_revista);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            $pdf_revista = $resultado["pdf_revista"];  
            $nombre_revista = $resultado["nombre_revista"];  

            echo '
                <object data="' . $pdf_revista . '" type="application/pdf" width="100%" height="100%" style="height:100vh;">
                    alt : <a href="' . $pdf_revista . '">' . $nombre_revista . '</a>
                </object>  
            ';                      

        }

        function MostrarNombreCatalogo($id_catalogo) {
            global $pdo;

            $operacion = "SELECT nombre_catalogo FROM catalogo WHERE id_catalogo = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id_catalogo);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
 
            $catalogo = $resultado["nombre_catalogo"];  

            echo $catalogo;                      

        }

        function MostrarDescrCatalogo($id_catalogo) {
            global $pdo;

            $operacion = "SELECT descripcion_catalogo FROM catalogo WHERE id_catalogo = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id_catalogo);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
 
            $catalogo = $resultado["descripcion_catalogo"];  

            echo $catalogo;                

        }
?>
