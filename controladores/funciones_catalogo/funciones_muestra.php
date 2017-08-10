<?php
require_once 'controladores/datos/ConexionBD.php';
$pdo = ConexionBD::obtenerInstancia()->obtenerBD();


//++++++++++++++++++++++++++++++++++++++++++       MASTER      +++++++++++++++++++++++++++++++++++++++++++++

function MostrarImagenes()
{
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

function MostrarRevista($id_revista)
{
    global $pdo;

    $operacion = "SELECT * FROM muestras WHERE id_muestra = ?";

    $sentencia = $pdo->prepare($operacion);
    $sentencia->bindParam(1, $id_revista);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();


    foreach ($resultado as $fila) {

        echo '
            <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                <div class="responsive-wrapper responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
	                <iframe src="http://docs.google.com/gview?embedded=true&url=http://historietas.mx/' . $fila["documento"] . '">
	                <p style="font-size: 110%;">
	                    <em><strong>ERROR: </strong> Tu navegador no soporta esta soportado </em> 
	                    Por favor actualiza tu navegador o 
	                     <a href="https://drive.google.com/file/d/0BxrMaW3xINrsR3h2cWx0OUlwRms/preview">descarga la historieta</a>
	                </p>
	                </iframe>
	            </div>
	        </div>
	        ';
    }

}

?>
