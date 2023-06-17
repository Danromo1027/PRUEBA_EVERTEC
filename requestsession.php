<?php
session_start();
include 'setup.php';

## ARMAR TRANKEY Y CIFRAR NONCE
$trankey_req = base64_encode(sha1($nonce.$seed.$secretkey,true));
$nonce64_req = base64_encode($nonce);

##datos que vienen desde formulario $reference $description $currency  $totals $

        $json = '{
            "auth": {
              "login": "'.$login.'",
              "tranKey":"'.$trankey_req.'",
              "nonce": "'.$nonce64_req.'",
              "seed": "'.$seed.'"
            }
          }';

//echo $json;
//PREPARAR EL CURL
$url = 'https://checkout-test.placetopay.com/api/session/'.$_SESSION['requestID'];

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

//var_dump($payload);

$_SESSION['status'] = $payload['payment'][0]['status']['status'];




if (!empty($payload['status'])) {
    // Redireccionar a otro archivo HTML
    header("Location: status.php");
    exit(); // Asegúrate de salir del script después de la redirección
 }else {
  var_dump($payload);
 }
?>