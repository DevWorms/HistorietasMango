    <?php
      require_once '../controladores/datos/ConexionBD.php';
      $pdo = ConexionBD::obtenerInstancia()->obtenerBD();


//++++++++++++++++++++++++++++++++++++++++++       MASTER      +++++++++++++++++++++++++++++++++++++++++++++
        
        function MostrarCaducidad($id) {
            global $pdo;

            $operacion = "SELECT fecha_caducidad FROM wallett WHERE id_usuario = ?";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            echo $resultado["fecha_caducidad"];

        }
        

        function SucursalStatus($idsucursal) {
            global $pdo;

            $operacion = "SELECT * FROM estatus_tienda WHERE id_tienda = ? ";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1, $idsucursal);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
                                    
            $resAbierto = $resultado["abierto"];
            $resColor = $resultado["color"];
            $resBN = $resultado["blanco_negro"];

            if($resAbierto == 1)
                $checkAbierto = "checked";
            else
                $checkAbierto = "";

            if($resColor == 1)
                $checkColor = "checked";
            else
                $checkColor = "";

            if($resBN == 1)
                $checkBN = "checked";
            else
                $checkBN = "";

            echo  '             
                    <input type="checkbox" id="abierto" name="abierto" ' . $checkAbierto . '> Abierto  <br>                    
                    <input type="checkbox" id="color" name="color" ' . $checkColor . '> Impresiones a Color  <br>
                    <input type="checkbox" id="blanconegro" name="blanconegro" ' . $checkBN . '> Impresiones Blanco y Negro  <br>                                 
                ';      
        }

        function ObtenerFechaHoy()  {       
            date_default_timezone_set('America/Mexico_City');

            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            $min_seg = getdate(date("U"));
            $hora = $min_seg["hours"];
            $minuto = $min_seg["minutes"];
            $am_pm = "";

            if($hora < 10)
                $hora = "0".$hora;
            if($minuto < 10)
                $minuto = "0".$minuto;

            if($hora >=0  && $hora <= 12 )
                $am_pm = "am";
            else
                $am_pm = "pm";
     
            echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') . " a las " . $hora .":" . $minuto . $am_pm ;

        }


        function ColaImpresion($idsucursal) {
            global $pdo;

            $operacion = "CALL hurryapp.consultarColaImpresion(?)";
            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1,$idsucursal);
            $sentencia->execute();            
            $resultado = $sentencia->fetchAll();

            $filas = $sentencia->rowCount();

            if($filas == 0)
                echo "No hay impresiones";
            else    {
                        foreach ($resultado as $fila) {
                            $bn = $fila["blanco_negro"];
                            $color = $fila["color"];
                            $cara = $fila["caratula_color"];
                            $lados = $fila["ambos_lados"];
                            $carta = $fila["carta"];
                            $oficio = $fila["oficio"];

                            $no = '<i class="fa fa-times" style="color:red"></i>';
                            $yes = '<i class="fa fa-check" style="color:green"></i>';

                            if($bn == 0)
                                $bn = $no;
                            else 
                                $bn = $yes;

                            if($color == 0)
                                $color = $no;
                            else 
                                $color = $yes;

                            if($cara == 0)
                                $cara = $no;
                            else 
                                $cara = $yes;
                            
                            if($lados == 0)
                                $lados = $no;
                            else 
                                $lados = $yes;

                            if($carta == 0)
                                $carta = $no;
                            else 
                                $carta = $yes;                    

                            if($oficio == 0)
                                $oficio = $no;
                            else 
                                $oficio = $yes;

                        echo  '

                                <tbody>
                                        <tr>
                                                <td>' . $fila["folio_documento"] . '</td>
                                                <td>' . $fila["nombre_documento"] . '</td>
                                                <td><a href= ' . $fila["ver"] . ' target="_blank" id="ver"> <i class="fa fa-file-text"></i> </a></td>
                                                <td>' . $fila["juegos"] . '</td>
                                                <td>' . $fila["numero_hojas"] . '</td>
                                                <td>' . $fila["rango_hojas"] . '</td>
                                                <td>' . $bn . '</td>
                                                <td>' . $color . '</td>
                                                <td>' . $cara . '</td>
                                                <td>' . $lados . '</td>
                                                <td>' . $carta . '</td>
                                                <td>' . $oficio. '</td>
                                                <td><input type="checkbox" id="' . $fila["folio_documento"] . '" name ="entregado[' . $fila["folio_documento"] . ']"></td>                                                    
                                                
                                            </tr>
                                </tbody>
                            ';
                            }                    
                    }
        }


        function EntregadosImpresion($idsucursal) {
            global $pdo;

            $operacion = "SELECT a.folio_documento, a.nombre_documento, a.juegos, a.numero_hojas, 
                                    a.rango_hojas, a.blanco_negro, a.color, a.caratula_color, a.ambos_lados, a.carta, 
                                    a.oficio, c.descripcion FROM documentos a inner join operacion b on a.id_operacion = b.id_operacion 
                                    inner join estatus c on c.id_estatus = a.estatus where activo = false and estatus = 3 
                                    and b.id_tienda= ? order by b.fecha_operacion desc";

            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1,$idsucursal);
            $sentencia->execute();            
            $resultado = $sentencia->fetchAll();

            $filas = $sentencia->rowCount();

            if($filas == 0)
                echo "No hay impresiones";
            else    {

                        foreach ($resultado as $fila) {

                                $bn = $fila["blanco_negro"];
                                $color = $fila["color"];
                                $cara = $fila["caratula_color"];
                                $lados = $fila["ambos_lados"];
                                $carta = $fila["carta"];
                                $oficio = $fila["oficio"];

                                $no = '<i class="fa fa-times" style="color:red"></i>';
                                $yes = '<i class="fa fa-check" style="color:green"></i>';

                                if($bn == 0)
                                    $bn = $no;
                                else 
                                    $bn = $yes;


                                if($color == 0)
                                    $color = $no;
                                else 
                                    $color = $yes;

                                if($cara == 0)
                                    $cara = $no;
                                else 
                                    $cara = $yes;
                                

                                if($lados == 0)
                                    $lados = $no;
                                else 
                                    $lados = $yes;

                                if($carta == 0)
                                    $carta = $no;
                                else 
                                    $carta = $yes;
                                

                                if($oficio == 0)
                                    $oficio = $no;
                                else 
                                    $oficio = $yes;



                            echo  '
        
                                            <tbody>
                                                    <tr>
                                                            <td>' . $fila["folio_documento"] . '</td>
                                                            <td>' . $fila["nombre_documento"] . '</td>
                                                            <td>' . $fila["juegos"] . '</td>
                                                            <td>' . $fila["numero_hojas"] . '</td>
                                                            <td>' . $fila["rango_hojas"] . '</td>
                                                            <td>' . $bn . '</td>
                                                            <td>' . $color . '</td>
                                                            <td>' . $cara . '</td>
                                                            <td>' . $lados . '</td>
                                                            <td>' . $carta . '</td>
                                                            <td>' . $oficio. '</td>
                                                            
                                                        </tr>
                                            </tbody>
                                        ';
                            }
                        }
        }


//++++++++++++++++++++++++++++++++++++++++++       USER      +++++++++++++++++++++++++++++++++++++++++++++



        function ObtenerSaldos($id_usuario, $seleccion) {
            global $pdo;

            $operacion = "SELECT ROUND(saldo,2) as saldo, ROUND(saldo_regalo,2) as saldo_regalo FROM wallet WHERE id_usuario = ? ";
            
            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1,$id_usuario);
            $sentencia->execute();

            $resultado = $sentencia->fetch();

            if($seleccion == "saldo")
                echo $resultado["saldo"];

            else if($seleccion == "regalo")
                echo $resultado["saldo_regalo"];

            else if($seleccion == "funcion")
                echo $resultado["saldo"] + $resultado["saldo_regalo"];

        }


        function ImpresionSucursal() {
            global $pdo;
           $counter = 1;

            $operacion = "SELECT a.id_tienda, a.nombre_tienda, a.direccion, a.lat, a.lng, b.abierto, b.color, b.blanco_negro 
                            FROM tienda a inner join estatus_tienda b on a.id_tienda = b.id_tienda 
                            ORDER BY a.id_tienda ASC";
            
            $sentencia = $pdo->prepare($operacion);
            $sentencia->bindParam(1,$id_usuario);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();

            $filas = $sentencia->rowCount();

            if($filas == 0)
                echo "Aún no se registran sucursales :(";
            else    {
                foreach ($resultado as $fila)    {

                    if($counter == 1)
                        $checked = "checked";
                    else
                        $checked = "";

                    $abierto = $fila["abierto"];
                    $bn = $fila["blanco_negro"];
                    $color = $fila["color"];

                    $no = '<i class="fa fa-times" style="color:red"></i>';
                    $yes = '<i class="fa fa-check" style="color:green"></i>';

                    if($abierto)
                        $abierto = $yes;
                    else 
                        $abierto = $no . '<p style="font-size:10px">Recoger mañana al abrir sucursal</p>';

                    if($bn)
                        $bn = $yes;
                    else 
                        $bn = $no;

                    if($color)
                        $color = $yes;
                    else 
                        $color = $no;

                    echo '
                              <tr>
                                <td style="word-wrap:break-word;"> <input type="radio" name="sucursal" value= "' . $fila["id_tienda"] . '" ' . $checked . '> '
                                 . $fila["nombre_tienda"] . '<br>
                                 <i>
                                 '. $fila["direccion"] .'
                                 </i>
                                 </td>

                                <td align="center"> ' . $abierto . '</td>
                                <td align="center"> ' . $bn . '</td>
                                <td align="center"> ' . $color . ' </td>
                              
                              </tr>
                    ';
                    $counter++;
                }
            }
        }


        function ListarSucursales() {
                global $pdo;

                $operacion = "SELECT * FROM  tienda";
            
                $sentencia = $pdo->prepare($operacion);
                $sentencia->bindParam(1,$id_usuario);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                $filas = $sentencia->rowCount();

                    if ($filas == 0) {
                        echo "No hay sucursales registradas.";
                    } else {
                        foreach ($resultado as $fila ) {

                            $direccion = $fila["direccion"];

                            echo  '
                               <li><i>' . $fila["nombre_tienda"] . '
                                <ul>
                                    <li>' . $fila["direccion"] . '</li>
                                </ul>

                               </i></li>
                            ';
                        }
                    }
        } 


        function ObtenerHistorialUsuario($id){
            global $pdo;

            $limite = 15;
            $contadorProducto = 1;

            $operacion = "CALL consultar_historial_usuario(?,?)";             
                $sentencia = $pdo->prepare($operacion);
                $sentencia->bindParam(1,$id);
                $sentencia->bindParam(2,$limite);
                $sentencia->execute();
            $resultado = $sentencia->fetchAll();

            $filas = $sentencia->rowCount();

                    if ($filas == 0) {
                        echo "No hay sucursales registradas.";
                    } else {

                            foreach ($resultado as $fila) {

                                if($fila["descripcion"] == "esperando")
                                    $statusDoc = '<td style="color: #d80027; font-size:18px;"><strong> Esperando <i class="fa fa-clock-o"></i></strong></td>';
                                else
                                    $statusDoc = '<td style="color: green"><strong> Entregado <i class="fa fa-check-circle-o"></i></strong></td>';
                                

                                echo '
                                        <tr id=detalleOperacion' . $fila["id_operacion"] . '>
                                            <td>' . $fila["folio_documento"] . '</td>
                                            <td>' . $fila["nombre_documento"] . '</td>
                                            <td> $' . $fila["costo"] . '</td>
                                            <td>' . $fila["fecha"] . '</td>
                                            <td>' . $fila["nombre_tienda"] . '</td>'
                                            . $statusDoc . '
                                        </tr>
                                    ';

                                $contadorProducto ++;
                            }
                    }
            
        }
?>
