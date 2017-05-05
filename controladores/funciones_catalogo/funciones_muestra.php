    <?php
      require_once 'controladores/datos/ConexionBD.php';
      $pdo = ConexionBD::obtenerInstancia()->obtenerBD();


//++++++++++++++++++++++++++++++++++++++++++       MASTER      +++++++++++++++++++++++++++++++++++++++++++++

      function MostrarImagenes() {
            global $pdo;

            $operacion = "SELECT * FROM muestras";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();


            foreach ($resultado as $fila) {

                echo '

                    <li>
                      <a href="revista.php?id=' . $fila["id_muestra"] . '" style="margin-bottom:2em; background:rgba(246, 243, 0, 0.24); color:#ff544e; text-decoration:none">
                        <h2><img src="' . $fila["imagen"] . '" height="241" width="210"></h2>
                        <p><h2 class="enlace comix">' . $fila["titulo"] . '</h2></p>
                      </a>
                    </li>

                ';
            }

        }

        function MostrarRevista($id_revista) {
            global $pdo;

            $operacion = "SELECT * FROM muestras WHERE id_muestra = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id_revista);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();


            foreach ($resultado as $fila) {

                echo '

                    <object data="' . $fila["documento"] . '" type="application/pdf" width="100%" height="100%" style="height:100vh;">
                    alt : <a href="' . $fila["documento"] . '">test.pdf</a>
                    </object>

                ';
            }

        }
        
?>
