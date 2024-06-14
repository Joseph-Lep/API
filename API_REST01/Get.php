<?php

function select($param1){
    // Je veux récuperer /planet dans les 2 cas et si il existe récuperer l'id de l'uri
    // explode -> trim
    // If uri est planete et méthode GET -> alors si uri contient id ou est vide alors :
    if $param1 = null{

    $reponse = $bdd->query('SELECT * FROM astronomical_object');
    $astronomical_object = $reponse->fetchAll();
}
    else {
    $reponse = $bdd->query('SELECT * FROM id');
    $astronomical_object = $reponse->fetchAll();
}
}

if ($uri_endpoint === '/planet' && $http_method === 'GET') {

    $reponse = $bdd->query('SELECT * FROM astronomical_object');
    $astronomical_object = $reponse->fetchAll();
    echo json_encode($astronomical_object);
    // todo feedback
    exit;
}

if ($uri_endpoint === '/planet/{id}' && $http_method === 'GET') {

    $urisegment = explode('/', $uri_endpoint, ltrim($uri));
    // j'ai besoin de me débarasser des / et du vide en index 0 généré par explode (qui considère ce vide comme un espace)
    // pour récuperer l'uri et le get

    $reponse = $bdd->query('SELECT * FROM id');
    $astronomical_object = $reponse->fetchAll();
    echo json_encode($astronomical_object);
    // todo feedback
    exit;
}
