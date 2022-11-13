<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/servicio.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "dui" : "04566888-7"
}',
  /*CURLOPT_HTTPHEADER => array(
    'Accept: application/json',': ',
    'Authorization: Basic '.base64_encode('usuario:pass123'),
    'Content-Type: application/json',
  ),*/
CURLOPT_HTTPHEADER => array(
    'Accept: application/json',': ',
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo2MTl9.fiBNaWdyYWNpb24gKEVsIFNhbHZhZG9yKSB+',
    'Content-Type: application/json',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
