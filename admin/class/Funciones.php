    <?php
      require_once '../controladores/datos/ConexionBD.php';
      $pdo = ConexionBD::obtenerInstancia()->obtenerBD();

//++++++++++++++++++++++++++++++++++++++++++       CONSOLE      +++++++++++++++++++++++++++++++++++++++++++++
        
        function ObtenerNumeroUsuarios()  {   
            global $pdo;

            $tipo_operacion = 1;
            $operacion = "SELECT COUNT(id_usuario) AS resultado FROM usuarios";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();

            $resultado=$sentencia->fetch();

            echo $resultado["resultado"];             
        }

        function ObtenerNumeroRevistas()  {   
            global $pdo;

            $tipo_operacion = 1;
            $operacion = "SELECT COUNT(id_revista) AS resultado FROM revistas";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();

            $resultado=$sentencia->fetch();

            echo $resultado["resultado"];             
        }

        function ObtenerNumeroBoletin()  {   
            global $pdo;

            $tipo_operacion = 1;
            $operacion = "SELECT COUNT(id_usuario) AS resultado FROM suscriptores_mail";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();

            $resultado=$sentencia->fetch();

            echo $resultado["resultado"];             
        }

        function ObtenerEdad()  {   
            global $pdo;

            $operacion = "SELECT COUNT(id_usuario) AS num_usuarios FROM usuarios";
            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();
            $resultado=$sentencia->fetch();

            $num_usuarios = $resultado["num_usuarios"];  


            $operacion2 = "SELECT SUM(edad) AS resultado FROM usuarios";
            $sentencia2 = $pdo->prepare($operacion2);
            $sentencia2->execute();
            $resultado2=$sentencia2->fetch();

            $resultadoSuma = $resultado2["resultado"];  

            echo ($resultadoSuma/$num_usuarios);
        }

        function ObtenerNumeroMujeres()  {   
            global $pdo;

            $tipo_operacion = 1;
            $operacion = "SELECT COUNT(id_usuario) AS resultado FROM usuarios WHERE sexo = 1";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();

            $resultado=$sentencia->fetch();

            echo $resultado["resultado"];             
        }

        function ObtenerNumeroHombres()  {   
            global $pdo;

            $tipo_operacion = 1;
            $operacion = "SELECT COUNT(id_usuario) AS resultado FROM usuarios WHERE sexo = 2";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->execute();

            $resultado=$sentencia->fetch();

            echo $resultado["resultado"];             
        }

?>
