<?php

// CURL - Requeter à une API 

$client = curl_init("https://dog.ceo/api/breeds/image/random");
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$data = json_decode($response, true);
curl_close($client);
var_dump($data);
// todo refacto l'obtention de la race
$imageUrl = $data['message'];
$getbreeds = explode('/breeds', $imageUrl);
$getbreeds = ltrim($getbreeds[1], '/');
$getbreeds = explode('/', $getbreeds);
$getbreeds = $getbreeds[0];
var_dump($getbreeds);
?>
<img src="<?php echo $imageUrl; ?>" alt="<?php echo $getbreeds ?>">
<h2>&#x2728; C'est un trop chouchou : <?php echo $getbreeds ?>&#x2728;</h2>