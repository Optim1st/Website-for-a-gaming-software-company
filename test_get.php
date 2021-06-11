<?php
$url = 'https://oplata.info/api/purchases/unique-code/';
$unique_code = 'D4FB108A429E4600';
$token = '6904a41910b949bfa1c10655ffbb6e77';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url.$unique_code. '?token=' .$token ); //Url together with parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_HEADER, array(
    "Accept: application/json"
  ));
    curl_setopt( $ch, CURLOPT_HEADER, false );
    
    $result = curl_exec($ch);

if(curl_errno($ch))  //catch if curl error exists and show it
  echo 'Curl error: ' . curl_error($ch);
else {
   echo $result;
   $exited = json_decode($result);
   $base64 = $exited->query_string;
   echo $base64;
 }
curl_close($ch);

$string = base64_decode($base64);
echo '<br>', $string;