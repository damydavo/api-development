<?php
$curl = curl_init();

curl_setopt_array($curl, [
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://www.anapioficeandfire.com/api/books',
CURLOPT_USERAGENT => ''
]);

$response = curl_exec($curl);

echo $response;

?>