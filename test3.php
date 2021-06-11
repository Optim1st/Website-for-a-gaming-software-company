<?php

$ID = 'ACB44CDE15F14FFEB8B83FBA1B6D285C';
$timestamp = $_SERVER['REQUEST_TIME'];
$sign = hash('sha256', $ID . $_SERVER['REQUEST_TIME']);

$data = ['timestamp' => $timestamp, 'sign' => $sign, 'id_seller' => 810759];
$data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
$curl = curl_init('https://api.digiseller.ru/api/apilogin');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
// Принимаем в виде массива. (false - в виде объекта)
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Accept: application/json',
   'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($curl);
curl_close($curl);
echo '<pre>';
print_r($result);