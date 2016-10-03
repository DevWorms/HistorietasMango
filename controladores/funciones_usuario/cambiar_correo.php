<?php
    require_once '../datos/ConexionBD.php';
    require_once '../sesion/sesion.php';

    if (isset($_POST['btn_aceptar'])) {
        $correo = $_POST['mail'];

        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        $consultaSesion = "UPDATE usuarios SET correo_usuario = ? WHERE id_usuario = " . $_SESSION['Id'];

        $sentenciaSesion = $pdo->prepare($consultaSesion);
        $sentenciaSesion->bindParam(1,$correo);
        $sentenciaSesion->execute();

        echo '<script>
                  if (confirm("Inicia sesión nuevamente con tu nuevo correo.") == true) {
                    window.location.href="../sesion/cerrar_sesion.php";
                  } else {
                  }
             </script>';             
        
            
    }
?>