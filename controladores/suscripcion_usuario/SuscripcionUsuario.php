<?php

class SuscripcionUsuario{
    
    function suscibe($nombre,$mail){
        session_start();
        $email = $mail;
        $fname = $nombre;
        $apiKey = 'f4e0d310b13444aab692c20467f988ad-us5';
        $listId = '2470231f62';

        // test credentials
        $apiKey_test = 'ee731945e14aeb7be9407b3428d1d4be-us14';
        $listId_test = '5e827d11b6';

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $memberId = md5(strtolower($email));
            $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
            $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

            $json = json_encode([
                'email_address' => $email,
                'status' => "subscribed", // "subscribed","unsubscribed","cleaned","pending"
                'merge_fields' => [
                    'FNAME' => $fname,
                    'LNAME' => 'NO'
                ]
            ]);
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // store the status message based on response code
            if ($httpCode == 200) {
                $_SESSION['msg'] = '<p style="color: #212121;font-weight:bold;font-size:120%">Te has suscrito</p>';
            } else {
                switch ($httpCode) {
                    case 214:
                        $msg = '<p style="color: #212121;font-weight:bold;font-size:120%">Te has suscrito</p>';
                        break;
                    default:
                        $msg = '<p style="color: #212121;font-weight:bold;font-size:120%">Ha ocurrido un problema, intentalo de nuevo</p>';
                        break;
                }
               $_SESSION['msg'] = '<p style="color: #212121;font-weight:bold;font-size:120%">' . $msg . '</p>';
            }
        } else {
           $_SESSION['msg'] = '<p style="color: #212121;font-weight:bold;font-size:120%">Por favor ingresa una direccion de correo válida.</p>';
          
        }  
            }
    }
    $fname = $_POST['nombre'];
    $email = $_POST['mail'];
    if(isset($_POST['donde'])){
        $donde = $_POST['donde'];
        if($donde == "muestra"){
            $nombre = $_POST["nombre"];
            echo $nombre;
            $mail=$_POST["mail"];
            $objeto = new SuscripcionUsuario();
            $objeto->suscibe($nombre,$mail);
            header('Location: ../../muestra.php');
        }  
    }
?>