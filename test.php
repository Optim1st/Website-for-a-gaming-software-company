<?php

$seller = 810759; #Сейчас здесь мои данные
$ID = "ACB44CDE15F14FFEB8B83FBA1B6D285C";
$timestamp = $_SERVER['REQUEST_TIME'];
$ID .= $timestamp;
$sign = hash('sha256', $ID);

$data = array(
    'seller_id' => $seller,
    'timestamp' => $timestamp,
    'sign' => $sign
    );

$payload = json_encode($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.digiseller.ru/api/apilogin");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Accept: application/json"
  ));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

echo $payload;

echo $server_output;

if(curl_errno($ch))  //catch if curl error exists and show it
    echo 'Curl error: ' . curl_error($ch);
  else    
    $exited = json_decode($server_output);
    $token = $exited->token;
    echo $token;

curl_close ($ch);
