<?php
session_start();
include 'setup.php';

## ARMAR TRANKEY Y CIFRAR NONCE
$secret = base64_encode(sha1($nonce.$seed.$secretkey,true));
$nonce64 = base64_encode($nonce);
##datos que vienen desde formulario $reference $description $currency  $totals $

        $json = '{
              "locale": "es_CO",
              "auth": {
                "login": "'.$login.'",
                "tranKey": "'.$secret.'",
                "nonce": "'.$nonce64.'",
                "seed": "'.$seed.'"
              },
          "payment": {
                "reference": "'.$_POST['Referencia'].'",
                "description": "'.$_POST['Descripcion'].'",
                "amount": {
                  "currency": "'.$_POST['tipo_moneda'].'",
                  "total": "'.$_POST['total'].'"
            }
          },
          "expiration": "'.$expiration.'",
            "returnUrl": "'.$returnUrl.'",
            "ipAddress": "127.0.0.1",
            "userAgent": "PlacetoPay Sandbox"
          }';

//PREPARAR EL CURL para authentication
$url = 'https://checkout-test.placetopay.com/api/session';

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json); // pasamos el json a el curl
$response = curl_exec($ch); // se ejecuta la peticion


curl_close($ch);
//LEER LA RESPUESTA DE LA PETICION
$payload = json_decode($response,true);

if (!empty($payload['requestId'])) {

  $_SESSION['requestID'] = $payload['requestId'];
  $_SESSION['processURL'] = $payload['processUrl'];
  // Redireccionar a otro archivo HTML
  header("Location: auth.php");
  exit(); // salir del script después de la redirección
}else {
var_dump($payload);
}
?>