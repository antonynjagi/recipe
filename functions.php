<?php

function initiateAPI($link){

$url=$link;

//start a curl
$curl=curl_init($url);

//options
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

//optional options
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

//send request
$result=curl_exec($curl);

//close connection
curl_close($curl);

return $result;


}

function convertIntoArray($link){

    $result = initiateAPI($link);

   $responseArray= json_decode($result,true);

   return $responseArray;

}

$link="https://www.themealdb.com/api/json/v1/1/categories.php"; 
$responseArray= convertIntoArray($link);
if(isset($_GET['url'])){
$responseArray1 = convertIntoArray($_GET['url']);
}
?>