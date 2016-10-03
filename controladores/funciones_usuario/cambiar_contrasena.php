<?php
    require_once '../datos/ConexionBD.php';
    require_once '../sesion/sesion.php';

    if (isset($_POST['btn_aceptar'])) {
        $pass = $_POST['pwd'];

        $pdo = ConexionBD::obtenerInstancia()->obtenerBD();
        $consultaSesion = "UPDATE usuarios SET contrasena = ? WHERE id_usuario = " . $_SESSION['Id'];

        $sentenciaSesion = $pdo->prepare($consultaSesion);
        $sentenciaSesion->bindParam(1,$pass);
        $sentenciaSesion->execute();

        echo '<script>
                  if (confirm("Contrasena modificada exitosamente.") == true) {
                    window.location.href="../../user/cuenta.php";
                  } else {
                  }
             </script>';             
        
            
    }
?>