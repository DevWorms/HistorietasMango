<?php
    require_once '../datos/ConexionBD.php';

      echo '
            <body style="background-color: #f5e1eb">
              <div style="text-align: center;">
                  <img src = "../../img/loading.png">
              </div>
            </body>
      ';

    function notificacion($msj) {
        echo 
        "<script>
            alert('" . $msj . "');
        </script>";
    }

    function regresar() {
        echo 
        "<script>
            window.history.back();
        </script>";
    }

    echo "Hola Mundo";

    if (isset($_POST['btn_acceder'])) {
        $correo = $_POST['email'];
        $contrasena = $_POST['pwd'];

        if ($correo == null || $contrasena == null) {
            notificacion($msj = "Por favor complete todos los campos");
            header("Location: ../../admin");
        } else {

                $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
                $consultaSesion = "SELECT * FROM administrador WHERE correo_usuario = ? AND contrasena = ?";

                $sentenciaSesion = $pdo->prepare($consultaSesion);
                $sentenciaSesion->bindParam(1,$correo);
                $sentenciaSesion->bindParam(2,$contrasena);
                $sentenciaSesion->execute();                
                $resultado = $sentenciaSesion->fetch();
                
                if($resultado)   {

                    session_start();
                        $_SESSION["Id"] = $resultado['id_usuario'];
                        $_SESSION["Nombre"] = $resultado['nombre_usuario'];
                        $_SESSION["Correo"] = $resultado['correo_usuario'];
                    session_write_close();

                    header("Location: ../../admin/WebMaster.php");

                    
                } else {
                    notificacion($msj = "El usuario o contraseña son incorrectos, vuelve a intentar.");
                    regresar();
                }
            }
    }
?>