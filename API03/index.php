<?php

// définir le mime / format des données à envoyer dans header réponse
// définir la route, le port et la méthode pour envoyer les données

// encoder les données issues du serveur/la bdd pour les envoyer au bon format
// + infos reponse ok ou non

set_exception_handler((function (Throwable $exeption) {
    http_reponse_code(500);
    echo json_encode(["Error" => "Un erreur est arrivée :("]);
}));

header('Content-Type: application/json; charset=utf-8');
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

var_dump($uri);
var_dump($method);

// json format utf8
// json_encode
// $_SERVER
// REQUEST_METHOD
// REQUEST_URI ou PATH_INFO