<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Documento sin título</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sweetalert.css" rel="stylesheet">
</head>
<?php
//registro del usuario en la base de datos
require_once '../datos/ConexionBD.php';
require_once '../suscripcion_usuario/SuscripcionUsuario.php';
$error = false;

//captura de la informacion posteada por el formulario de la pagina registro.php
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$pwd = $_POST['pwd'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$API = rand(0, 100000);
$formadepago = $_POST['formadepago'];

$pdo = ConexionBD::obtenerInstancia()->obtenerBD();
$pdo2 = ConexionBD::obtenerInstancia()->obtenerBD();
$queryCheckEmail = $pdo2->prepare('SELECT correo_usuario FROM usuarios WHERE correo_usuario=:email;');
$queryCheckEmail->bindParam(":email", $customer_email);
$queryCheckEmail->execute();
$res = $queryCheckEmail->fetchAll();
if (count($res) > 0) {
    $error = true;
} else {
    $sentenciaRegistro = $pdo->prepare("INSERT INTO usuarios (nombre_usuario,correo_usuario,contrasena,sexo,edad,premium,API) VALUES (:Usuario,:Correo,:Contrasena,:Sexo,:Edad,'0',:API)");

    $sentenciaRegistro->bindParam(':Usuario', $customer_name);
    $sentenciaRegistro->bindParam(':Correo', $customer_email);
    $sentenciaRegistro->bindParam(':Contrasena', $pwd);
    $sentenciaRegistro->bindParam(':Sexo', $sexo);
    $sentenciaRegistro->bindParam(':Edad', $edad);
    $sentenciaRegistro->bindParam(':API', $API);

    $sentenciaRegistro->execute();

    //obtener el dato para el registro en la tabla wallett y en caso de paypal
    $consultaSesion = "SELECT * FROM usuarios WHERE correo_usuario = ? AND contrasena = ?";
    $sentenciaSesion = $pdo->prepare($consultaSesion);
    $sentenciaSesion->bindParam(1, $customer_email);
    $sentenciaSesion->bindParam(2, $pwd);
    $sentenciaSesion->execute();
    $resultado = $sentenciaSesion->fetch();

    $custom = $resultado['id_usuario'];

    //Registro del usuario en la tabla wallett

    $sentenciaRegistroWallett = $pdo->prepare("INSERT INTO wallett (id_usuario,numero_tarjeta) VALUES (:id_usuario,'0')");
    $sentenciaRegistroWallett->bindParam(':id_usuario', $custom);
    $sentenciaRegistroWallett->execute();

    //aqui solo nesecitamos el nombre y el mail para mailchimp, el metodo suscribe hace todo
    $suscribir = new SuscripcionUsuario();
    $suscribir->suscibe($customer_name, $customer_email);
    echo "si";
}
?>

<body>
<!--

-->

<form action="https://compropago.com/comprobante" method="post" id="formaCompropago">
    <input type="hidden" name="public_key" value="pk_test_962f27606164387129">
    <input type="hidden" name="product_price" value="50.00">
    <input type="hidden" name="product_name" value="Membresia 1 mes">
    <input type="hidden" name="product_id" value="M1M">
    <input type="hidden" name="customer_name" value="<?php echo $customer_name; ?>">
    <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
    <input type="hidden" name="customer_phone" value="">
    <input type="hidden" name="image_url" value="">
    <input type="hidden" name="success_url" value="http://www.historietas.mx">
    <input type="hidden" name="failed_url" value="">
</form>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" id="formaPaypal">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="B7U9YLYQRFDKS">
    <input type="hidden" name="custom" value="<?php echo $custom; ?>"/>
</form>

<!-- script que manda la informacion del formulario automaticamente sin ninguna accion por parte del usuario -->
<script type="text/javascript">
    var formapago = <?php echo json_encode($formadepago); ?>;
    if (formapago == "compropago") {
        document.getElementById('formaCompropago').submit();
    }
    else if (formapago == "paypal") {
        document.getElementById('formaPaypal').submit();
    }
</script>

<?php
if ($error) {
    ?>
    <script src="../../js/sweetalert.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        swal({
            title: "",
            text: "El correo electrónico <?php echo $customer_email; ?> ya se encuentra registrado. <br><br> <a class='btn btn-info' href='../../registro.php'>Volver atras</a>",
            type: "warning",
            html: true,
            showConfirmButton: false
        });
    </script>
    <?php
}
?>

</body>
</html>
